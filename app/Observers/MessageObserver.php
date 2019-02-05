<?php

namespace App\Observers;

use App\Message;
use App\Conversation;
use App\Events\MessageSent;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        $conversation = Conversation::where('user_id', $message->sender_id)->where('contact_id', $message->recipent_id)->first();
        if($conversation){
            $conversation->last_message = "Tu: $message->message";
            $conversation->last_message_time = $message->created_at;
            $conversation->save();
        }
        $conversation = Conversation::where('contact_id', $message->sender_id)->where('user_id', $message->recipent_id)->first();
        if($conversation){
            $conversation->last_message = "$conversation->contact_name: $message->message";
            $conversation->last_message_time = $message->created_at;
            $conversation->save();
        }
        event(new MessageSent($message));
    }
}