<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberStoreRequest;
use App\Http\Requests\TeamMemberUpdateRequest;
use App\Models\Field;
use App\Models\Team;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Team::all();

        return view('pages.admin.team.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Field::all();

        return view('pages.admin.team.create', [
            'fields' => $fields
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamMemberStoreRequest $request)
    {
        // store product images
        if(isset($request->profile_image) && count($request->profile_image) > 0) {
            foreach($request->profile_image as $key => $image) {
                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/teams';

                    $imageName = 'teams_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'prefix' => $request->prefix,
            'member_type' => $request->member_type,
            'name' => $request->name,
            'designation' => $request->designation,
            'expertise' => $request->expertise,
            'photo_url' => $imageUrl,
            'profile_url' => $request->profile_url,
            'is_active' => isset($request->active) && $request->active == "on" ? 1 : 0   
        ];

        $team = Team::create($data);

        $team->fields()->attach($request->fields);

        return redirect()->route('admin.teams.index')
                         ->with('success', 'New team member created successfully');
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
        $selectedfieldIds = [];
        $member = Team::find($id);
        if(empty($member)) {
            abort(404);
        }

        $fields = Field::all();

        // field ids
        if(count($member->fields) > 0) {
            foreach($member->fields as $field) {
                $selectedfieldIds[] = (string) $field->id;
            }
        }

        $selectedfieldIdss = json_encode($selectedfieldIds);

        return view('pages.admin.team.edit', [
            'member' => $member,
            'fields' => $fields,
            'selectedfieldIds' => $selectedfieldIdss
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamMemberUpdateRequest $request, $id)
    {
        $member = Team::find($id);
        if(empty($member)) {
            return response()->json([
                'success' => false,
                'message' => 'Woops! The requested resource was not found!'
            ], 404);
        }

        if(isset($request->profile_image) && count($request->profile_image) > 0) {
            foreach($request->profile_image as $key => $image) {

                // delete previous image
                $this->deleteImage($member->photo_url);

                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/teams';

                    $imageName = 'teams_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'prefix' => $request->prefix,
            'member_type' => $request->member_type,
            'name' => $request->name,
            'designation' => $request->designation,
            'expertise' => $request->expertise,
            'photo_url' => isset($imageUrl) ? $imageUrl : $member->photo_url,
            'profile_url' => $request->profile_url,
            'is_active' => isset($request->active) && $request->active == "on" ? 1 : 0   
        ];

        $member->update($data);

        $member->fields()->sync($request->fields);

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Team member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Team::find($id);
        if(empty($member)) {
            abort(404);
        }

        $this->deleteImage($member->photo_url);
        
        $member->delete();               

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Team member deleted successfully');
    }

    public function deleteTeamImage($teamId)
    {
        $member = Team::find($teamId);
        if(empty($member)) {
            return response()->json([
                'success' => false,
                'message' => 'Woops! The requested resource was not found!'
            ], 404);
        }

        $isDeleted = $this->deleteImage($member->photo_url);
        
        if($isDeleted) {
            // delete image from db
            $data = [
                'photo_url' => null,  
            ];

            $member->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Well done! Team member image deleted successfully.',
        ], 200);
    }
}
