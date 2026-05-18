<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Garden;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Fetch conversation history between current user and the garden owner.
     */
    public function index(Garden $garden)
    {
        // Fetch all messages for this garden to act as a group discussion
        $messages = Message::with('sender')
            ->where('garden_id', $garden->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    /**
     * Store a new message and broadcast it.
     */
    public function store(Request $request, Garden $garden)
    {
        $request->validate([
            'message_text' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $garden->user_id,
            'garden_id' => $garden->id,
            'message_text' => $request->message_text,
        ]);

        // Broadcast the message instantly
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'success', 'message' => $message]);
    }
}
