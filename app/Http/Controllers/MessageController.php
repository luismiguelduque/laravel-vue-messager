<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;

class MessageController extends Controller
{
    public function index()
    {
        $userId =  auth()->id();
        return Message::select(
            'id',
            DB::raw("IF(sender_id = $userId, TRUE, FALSE) as written_by_my"),
            'created_at',
            'message'
        )->get();
    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->recipent_id = $request->recipent_id;
        $message->message = $request->message;
        $saved = $message->save();
        $response = [];
        $response['success'] = $saved;
        return $response;
    }
}
