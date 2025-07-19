<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\SocialMedia;

class SiteController extends Controller
{
    public function getSiteData()
    {
        $data = [];
        
        $socialMedia = SocialMedia::active()->get();

        $data['socialMedia'] = $socialMedia;

        $contactInfo = Contact::first();

        $data['contactInfo'] = $contactInfo;

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
