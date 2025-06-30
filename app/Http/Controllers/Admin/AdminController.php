<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Models\Admin;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('pages.admin.admins.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
        // store profile image
        if($request->hasFile('photo')) {
             $image = $request->file('photo');
            // if file is uploaded file object
            if($image instanceof \Illuminate\Http\UploadedFile) {

                $path = 'upload/others';

                $imageName = 'profiles_' . uniqid();

                $imageUrl = $this->uploadImage($image, $path, $imageName);            
            }
        }

        $data = [
           'name' => $request->name,
           'email' => $request->email,
           'password' => $request->password,
           'photo' => isset($imageUrl) ? $imageUrl : null,
           'status' => isset($request->active) && $request->active == "on" ? 'active' : 'blocked'
        ];

        Admin::create($data);

        return redirect()->route('admin.admins.index')
                         ->with('success', 'Admin created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get admin
        $admin = Admin::find($id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}
        
        return view('pages.admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get admin
        $admin = Admin::find($id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        $data = [
           'name' => $request->name,
         //  'email' => $request->email,
           'status' => isset($request->active) && $request->active == "on" ? 'active' : 'blocked'
        ];

        // store profile image
        if($request->hasFile('photo')) {
             $image = $request->file('photo');
            // if file is uploaded file object
            if($image instanceof \Illuminate\Http\UploadedFile) {

                // delete previous image from folder
                if(isset($admin->photo)) {
                    $this->deleteImage($admin->photo);
                }

                $path = 'upload/others';

                $imageName = 'profiles_' . uniqid();

                $imageUrl = $this->uploadImage($image, $path, $imageName);

                $data['photo'] = $imageUrl;
            
            }
        }

        $admin->update($data);

        return redirect()->route('admin.admins.index')
                         ->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        // delete image from folder if exist
        if(isset($admin->photo)) {
            $this->deleteImage($admin->photo);
        }

        $admin->delete();               

        return redirect()->route('admin.admins.index')
                         ->with('success', 'Admin deleted successfully');
    }
}
