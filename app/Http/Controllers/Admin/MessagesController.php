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
    public function index(Request $request, Apartment $apartment)
    {
        $user = Auth::user();

        $apartment = Apartment::with('title');

        $messages = Message::whereHas('apartment', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->orderBy('created_at', 'desc')->get();

        return view('admin.messages.index', compact('messages', 'apartment'));
    }
    public function getApartmentTitle($apartment_id)
    {
        try {
            $apartment = Apartment::findOrFail($apartment_id);
            $apartmentTitle = $apartment->title;

            return $apartmentTitle;
        } catch (\Exception $e) {
            // Handle the exception, e.g., show an error message or redirect
            return 'Apartment title not found';
        }
    }

    public function getMessageApartmentTitle($messageId)
    {
        try {
            $message = Message::findOrFail($messageId);
            $apartmentId = $message->apartment_id;

            $apartmentTitle = $this->getApartmentTitle($apartmentId);

            return view('admin.messages.index', compact('apartmentTitle'));
        } catch (\Exception $e) {
            // Handle the exception, e.g., show an error message or redirect
            return 'Apartment title not found';
        }
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
