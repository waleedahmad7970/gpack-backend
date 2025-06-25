<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.partials.admin._head')
    <body 
        id="body" 
        class="{{ isset($hideLayout) && $hideLayout ? 'auth-page' : 'light-sidebar menuitem-active' }}"
    >
        {{-- @include('layouts.partials._loader') --}}
        
        @unless (isset($hideLayout) && $hideLayout)
            @include('layouts.partials.admin._left_sidebar')
            @include('layouts.partials.admin._topbar')

            <div class="page-wrapper">
                <!-- Page Content-->
                <div class="page-content-tab">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                {{--   @include('layouts.partials._rightbar-offcanvas') --}}
                    @include('layouts.partials.admin._footer')
                </div>
            </div>
        @else
            <div class="container-md">
                @yield('content')
            </div><!--end container-->
        @endunless

        @vite('resources/js/admin.js')
        @yield('script')
    </body>
</html>