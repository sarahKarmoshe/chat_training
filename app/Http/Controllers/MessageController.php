<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message_receipent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\jsonResponse
     */
    public function index()
    {
        //show my message
        $message= Message::query()->where('user_id','=',Auth::id());
        $conversation=Message_receipent::query()->where('user_id','=',Auth::id());
        //$hiii
        //byy

        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\jsonResponse
     */
    public function store(StoreMessageRequest $request)
    {
        //send new message
        $message=Message::query()->create([
            'message_content'=>$request->message_content,
            'user_id'=>Auth::id(),
        ]);

        return response()->json($message,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\jsonResponse
     */

    // show all users in the app
    public function show()
    {
        $users=User::query()->where('id','!=',Auth::id())->get();
        return response()->json($users , Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
