<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutPage;
use App\Models\HomePage;
use App\Models\Publication;
use App\Models\PublicationPage;
use App\Models\Team;
use App\Models\TeamPage;
use App\Models\WhyPage;
use App\Models\Contact;

class PageController extends Controller
{
    public function getHomePage()
    {
        $data = [];

        $homePage = HomePage::first();

        $data['title'] = $homePage->title;
        $data['subtitle'] = $homePage->subtitle;
        $data['banner_image_url'] = $homePage->banner_image_url;

        $teamMemberIds = json_decode($homePage->team_member_ids);

        $teamMembers = Team::with('fields')->whereIn('id', $teamMemberIds)->get();

        $data['team_members'] = $teamMembers;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getAboutPage()
    {
        $data = [];

        $aboutPage = AboutPage::first();

        $teamMemberIds = json_decode($aboutPage->team_member_ids);

        $teamMembers = Team::with('fields')->whereIn('id', $teamMemberIds)->get();

        $data['team_members'] = $teamMembers;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getWhyUsPage()
    {
        $data = [];

        $whyPage = WhyPage::first();

        $teamMemberIds = json_decode($whyPage->team_member_ids);

        $teamMembers = Team::with('fields')->whereIn('id', $teamMemberIds)->get();

        $data['ceo_name'] = $whyPage->ceo_name;
        $data['ceo_message'] = $whyPage->ceo_message;
        $data['ceo_image_url'] = $whyPage->ceo_image_url;
        $data['team_members'] = $teamMembers;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getTeamPage()
    {
        $data = [];

        $teamPage = TeamPage::first();

        $teamMemberIds = json_decode($teamPage->team_member_ids);

        $coreMembers = Team::with('fields')->whereIn('id', $teamMemberIds)->core()->get();
        $fellowMembers = Team::with('fields')->whereIn('id', $teamMemberIds)->fellow()->get();

        $data['core_members'] = $coreMembers;
        $data['fellow_members'] = $fellowMembers;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getPublicationPage()
    {
        $data = [];

        $pubPage = PublicationPage::first();

        $publicationIds = json_decode($pubPage->publication_ids);

        $books = Publication::whereIn('id', $publicationIds)->book()->get();
        $chapters = Publication::whereIn('id', $publicationIds)->chapter()->get();
        $assignments = Publication::whereIn('id', $publicationIds)->assignment()->get();

        $data['books'] = $books;
        $data['chapters'] = $chapters;
        $data['assignments'] = $assignments;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getApproachPage()
    {
        $data = [];

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getContactPage()
    {
        $data = [];

        $contactInfo = Contact::first();

        $data['contactInfo'] = $contactInfo;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
