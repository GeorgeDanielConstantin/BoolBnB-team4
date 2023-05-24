<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $messages = Message::whereHas('apartment', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->orderBy('created_at', 'desc')->get();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message, Apartment $apartment)
    {
        return view('admin.messages.show', compact('message', 'apartment'));
    }
}
