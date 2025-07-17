<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMedia::all();

        return view('pages.admin.socials.index', [
            'socials' => $socials
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
        $smedia = SocialMedia::find($id);
        if(empty($smedia)) {
            abort(404);
        }

        $data = [
            'url' => $request->url,
            'is_active' => isset($request->active) && $request->active == "on" ? 1 : 0   
        ];

        $smedia->update($data);

        return redirect()->route('admin.socials.index')
                         ->with('success', 'Social media link updated successfully');
    }
}
