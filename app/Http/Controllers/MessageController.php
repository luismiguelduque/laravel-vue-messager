<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $userId =  auth()->id();
        $contactId = $request->contact_id;
        return Message::select(
            'id',
            DB::raw("IF(sender_id = $userId, TRUE, FALSE) as written_by_me"),
            'created_at',
            'message'
        )->where(function($query) use ($userId, $contactId){
            $query->where('sender_id', $userId)->where('recipent_id', $contactId);
        })->orWhere(function($query) use ($userId, $contactId){
            $query->where('sender_id', $contactId)->where('recipent_id', $userId);
        })->get();
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
        $response['message'] = $message;
        return $response;
    }
}
