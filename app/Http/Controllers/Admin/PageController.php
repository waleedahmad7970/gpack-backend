<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\UploadImageTrait;

use App\Http\Requests\AboutPageUpdateRequest;
use App\Http\Requests\HomePageUpdateRequest;
use App\Http\Requests\TeamPageUpdateRequest;
use App\Http\Requests\WhyPageUpdateRequest;

use App\Models\AboutPage;
use App\Models\HomePage;
use App\Models\Publication;
use App\Models\PublicationPage;
use App\Models\Team;
use App\Models\TeamPage;
use App\Models\WhyPage;

class PageController extends Controller
{
    use UploadImageTrait;

    public function homePageEdit()
    {
        $homePage = HomePage::first();
        $teamMembers = Team::active()->get();

        $selectedTeamIds = !empty($homePage->team_member_ids) ? $homePage->team_member_ids : json_encode([]);

        return view('pages.admin.pages.home', [
            'homePage' => $homePage,
            'teamMembers' => $teamMembers,
            'selectedTeamIds' => $selectedTeamIds
        ]);
    }

    public function homePageUpdate(HomePageUpdateRequest $request, $id)
    {
        $homePage = HomePage::find($id);
        if(empty($homePage)) {
            abort(404);
        }

        if(isset($request->banner_image) && count($request->banner_image) > 0) {
            foreach($request->banner_image as $key => $image) {

                // delete previous image
                $this->deleteImage($homePage->banner_image_url);

                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/others';

                    $imageName = 'banner_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'banner_image_url' => isset($imageUrl) ? $imageUrl : $homePage->banner_image_url,
            'team_member_ids' => json_encode($request->teams), 
        ];

        $homePage->update($data);

        return redirect()->route('admin.pages.home.edit')
                         ->with('success', 'Home page updated successfully');
    }

    public function deletehomePageBannerImage($homePageId)
    {
        $homePage = HomePage::find($homePageId);
        if(empty($homePage)) {
            return response()->json([
                'success' => false,
                'message' => 'Woops! The requested resource was not found!'
            ], 404);
        }

        $isDeleted = $this->deleteImage($homePage->banner_image_url);
        
        if($isDeleted) {
            // delete image from db
            $data = [
                'banner_image_url' => null,  
            ];

            $homePage->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Well done! Banner image deleted successfully.',
        ], 200);   
    }

    public function aboutPageEdit()
    {
        $aboutPage = AboutPage::first();
        $teamMembers = Team::active()->get();

        $selectedTeamIds = !empty($aboutPage->team_member_ids) ? $aboutPage->team_member_ids : json_encode([]);

        return view('pages.admin.pages.about-us', [
            'aboutPage' => $aboutPage,
            'teamMembers' => $teamMembers,
            'selectedTeamIds' => $selectedTeamIds
        ]);
    }

    public function aboutPageUpdate(AboutPageUpdateRequest $request, $id)
    {
        $aboutPage = AboutPage::find($id);
        if(empty($aboutPage)) {
            abort(404);
        }

        $data = [
            'team_member_ids' => json_encode($request->teams), 
        ];

        $aboutPage->update($data);

        return redirect()->route('admin.pages.about.edit')
                         ->with('success', 'About page updated successfully');
    }

    public function whyUsPageEdit()
    {
        $whyPage = WhyPage::first();
        $teamMembers = Team::active()->get();

        $selectedTeamIds = !empty($whyPage->team_member_ids) ? $whyPage->team_member_ids : json_encode([]);

        return view('pages.admin.pages.why-us', [
            'whyPage' => $whyPage,
            'teamMembers' => $teamMembers,
            'selectedTeamIds' => $selectedTeamIds
        ]);
    }

    public function whyUsPageUpdate(WhyPageUpdateRequest $request, $id)
    {
        $whyPage = WhyPage::find($id);
        if(empty($whyPage)) {
            abort(404);
        }

        if(isset($request->ceo_image) && count($request->ceo_image) > 0) {
            foreach($request->ceo_image as $key => $image) {

                // delete previous image
                $this->deleteImage($whyPage->ceo_image_url);

                // if file is uploaded file object
                if($image instanceof \Illuminate\Http\UploadedFile) {

                    $path = 'upload/others';

                    $imageName = 'ceo_' . uniqid();

                    $imageUrl = $this->uploadImage($image, $path, $imageName);
                }
            }
        }

        $data = [
            'ceo_name' => $request->ceo_name,
            'ceo_message' => $request->ceo_message,
            'ceo_image_url' => isset($imageUrl) ? $imageUrl : $whyPage->ceo_image_url,
            'team_member_ids' => json_encode($request->teams), 
        ];

        $whyPage->update($data);

        return redirect()->route('admin.pages.why.edit')
                         ->with('success', 'Why us page updated successfully');
    }

    public function deleteWhyPageImage($whyPageId)
    {
        $whyPage = WhyPage::find($whyPageId);
        if(empty($whyPage)) {
            return response()->json([
                'success' => false,
                'message' => 'Woops! The requested resource was not found!'
            ], 404);
        }

        $isDeleted = $this->deleteImage($whyPage->ceo_image_url);
        
        if($isDeleted) {
            // delete image from db
            $data = [
                'ceo_image_url' => null,  
            ];

            $whyPage->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Well done! Ceo image deleted successfully.',
        ], 200);
    }

    public function teamPageEdit()
    {
        $teamPage = TeamPage::first();
        $teamMembers = Team::active()->get();

        $selectedTeamIds = !empty($teamPage->team_member_ids) ? $teamPage->team_member_ids : json_encode([]);

        return view('pages.admin.pages.team', [
            'teamPage' => $teamPage,
            'teamMembers' => $teamMembers,
            'selectedTeamIds' => $selectedTeamIds
        ]);
    }

    public function teamPageUpdate(TeamPageUpdateRequest $request, $id)
    {
        $teamPage = TeamPage::find($id);
        if(empty($teamPage)) {
            abort(404);
        }

        $data = [
            'team_member_ids' => json_encode($request->teams), 
        ];

        $teamPage->update($data);

        return redirect()->route('admin.pages.team.edit')
                         ->with('success', 'Team page updated successfully');
    }

    public function publicationPageEdit()
    {
        $publicationPage = PublicationPage::first();
        $publications = Publication::all();

        $selectedPublicationIds = !empty($publicationPage->publication_ids) ? $publicationPage->publication_ids : json_encode([]);

        return view('pages.admin.pages.publication', [
            'publicationPage' => $publicationPage,
            'publications' => $publications,
            'selectedPublicationIds' => $selectedPublicationIds
        ]);
    }

    public function publicationPageUpdate(Request $request, $id)
    {
        $pubPage = PublicationPage::find($id);
        if(empty($pubPage)) {
            abort(404);
        }

        $data = [
            'publication_ids' => json_encode($request->publications), 
        ];

        $pubPage->update($data);

        return redirect()->route('admin.pages.publication.edit')
                         ->with('success', 'Publication page updated successfully');
    }
}
