<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $userId)
    {
        $userTo = User::find($userId);
        $userFrom = auth()->user();

        $messages = Message::where(
            function ($query) use ($userFrom, $userTo) {
                $query->where([
                    'sender_id' => $userFrom->id,
                    'receiver_id' => $userTo->id,
                ]);
            }
        )->orWhere(
            function ($query) use ($userFrom, $userTo) {
                $query->where([
                    'sender_id' => $userTo->id,
                    'receiver_id' => $userFrom->id,
                ]);
            }
        )->orderBy('created_at', 'asc')->get();

        return $messages;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'message' => $request->message,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
        ]);

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
