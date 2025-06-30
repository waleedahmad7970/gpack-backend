<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

use Carbon\Carbon;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.support.index');
    }

    public function getNewMessages()
    {
        $msgArray = [];
        $messages = Message::unread()->sort('desc')->get();

        if(count($messages) > 0) {
            foreach($messages as $key => $msg) {
                $msgArray[] = [
                    'id' => $msg->id,
                    'user' => $msg->name,
                    'status' => $msg->is_read,
                    'date' => Carbon::parse($msg->created_at)->toFormattedDateString(),
                    'details' => $msg->id
                ];
            }
        }

        return json_encode($msgArray);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get support ticket
        $message = Message::find($id);
        if(!isset($message) || empty($message)) {
    		abort(404);
    	}

        $data = ['is_read' => 1];
        // set message as read
        $message->update($data);
        
        return view('pages.admin.support.show', [
            'ticket' => $message
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function log()
    {
        return view('pages.admin.support.log');
    }

    public function getAllMessages()
    {
        $msgArray = [];
        $messages = Message::sort('desc')->get();

        if(count($messages) > 0) {
            foreach($messages as $key => $msg) {
                $msgArray[] = [
                    'id' => $msg->id,
                    'user' => $msg->name,
                    'status' => $msg->is_read,
                    'date' => Carbon::parse($msg->created_at)->toFormattedDateString(),
                    'details' => $msg->id
                ];
            }
        }

        return json_encode($msgArray);
    }
}
