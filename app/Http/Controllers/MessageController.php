<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message_receipent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\jsonResponse
     */

    public function show_my_conversations(){
        $users1=Message::query()->where('user_id','=',Auth::id())
            ->join('message_receipents','messages.id','=','message_id')
            ->join('users','message_receipents.recipient_id','=','users.id')
        //->get();
         ->select('users.id','users.name')->get();

        $users2=Message_receipent::query()->where('recipient_id','=',Auth::id())
            ->join('messages','message_receipents.message_id','=','messages.id')
            ->join('users','messages.user_id','=','users.id')
            ->select('users.id','users.name')->get();


       $users= $users1->merge($users2);

        return response()->json($users);
    }



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\jsonResponse
     */
    public function index($recipient_id)
    {
        //show my message
        $message= Message::query()->where('user_id','=',Auth::id());
        $conversation=Message_receipent::query()->where('user_id','=',Auth::id());
        //$hiii

        $conversation = Message_receipent::query()->where('recipient_id', '=', $recipient_id)
            ->join('messages', 'message_receipents.message_id', '=', 'messages.id')
            ->where('messages.user_id', '=', Auth::id())
            ->orWhere('message_receipents.recipient_id', '=', Auth::id())
            ->where('messages.user_id', '=', $recipient_id)
            ->select('messages.message_content', 'messages.user_id as sender', 'message_receipents.recipient_id as recipient', 'messages.created_at')
            ->get();

        $sender = Auth::user();
        $recipient = User::query()->where('id', '=', $recipient_id)->get();

        $data['messages'] = $conversation;
        $data['sender'] = $sender;
        $data['recipient'] = $recipient;

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMessageRequest $request
     * @return \Illuminate\Http\jsonResponse
     */
    public function store(StoreMessageRequest $request)
    {
        //send new message
        $message = Message::query()->create([
            'message_content' => $request->message_content,
            'user_id' => Auth::id(),
        ]);
        Message_receipent::query()->create([
            'recipient_id' => $request->recipient_id,
            'message_id' => $message->id
        ]);

        return response()->json($message, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\jsonResponse
     */

    // show all users in the app
    public function show()
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return response()->json($users, Response::HTTP_OK);

    }

}
