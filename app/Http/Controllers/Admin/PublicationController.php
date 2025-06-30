<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Publication;
use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Traits\UploadImageTrait;

class PublicationController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::sort('asc')->get();

        return view('pages.admin.publications.index', [
            'publications' => $publications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationStoreRequest $request)
    {
        // store product images
        if(isset($request->image) && count($request->image) > 0) {
            foreach($request->image as $key => $image) {
                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/others';

                    $imageName = 'publication_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'type' => $request->publication_type,
            'title' => $request->title,
            'author' => $request->author,
            'summary' => $request->summary,
            'image_url' => $imageUrl
        ];

        Publication::create($data);

        return redirect()->route('admin.publications.index')
                         ->with('success', 'New publication created successfully');
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
        $publication = Publication::find($id);
        if(empty($publication)) {
            abort(404);
        }

        return view('pages.admin.publications.edit', [
            'publication' => $publication
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationUpdateRequest $request, $id)
    {
        $publication = Publication::find($id);
        if(empty($publication)) {
            abort(404);
        }

        if(isset($request->image) && count($request->image) > 0) {
            foreach($request->image as $key => $image) {

                // delete previous image
                $this->deleteImage($publication->image_url);

                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/teams';

                    $imageName = 'teams_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'type' => $request->publication_type,
            'title' => $request->title,
            'author' => $request->author,
            'summary' => $request->summary,
            'image_url' => $imageUrl
        ];

        $publication->update($data);

        return redirect()->route('admin.publications.index')
                         ->with('success', 'Publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);
        if(empty($publication)) {
            abort(404);
        }

        $publication->delete();

        return redirect()->route('admin.publications.index')
                         ->with('success', 'Publication deleted successfully');
    }
}
