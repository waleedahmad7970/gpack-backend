<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormStoreRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactFormStoreRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_read' => 0
        ];

        Message::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Well-done! Your request submit successfully'
        ], 200);
    }
}
