<?php

namespace App\Http\Controllers;

use App\Models\Message_receipent;
use App\Http\Requests\StoreMessage_receipentRequest;
use App\Http\Requests\UpdateMessage_receipentRequest;

class MessageReceipentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessage_receipentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessage_receipentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message_receipent  $message_receipent
     * @return \Illuminate\Http\Response
     */
    public function show(Message_receipent $message_receipent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessage_receipentRequest  $request
     * @param  \App\Models\Message_receipent  $message_receipent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessage_receipentRequest $request, Message_receipent $message_receipent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message_receipent  $message_receipent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message_receipent $message_receipent)
    {
        //
    }
}
