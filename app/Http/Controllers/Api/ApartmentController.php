<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();

        $apartments = Apartment::all();



        foreach ($apartments as $apartment) {
            $apartment->image = $apartment->getImageUri();
        }

        return response()->json(compact('apartments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $apartment = Apartment::with('service', 'messages')->findOrFail($id);

        if (!$apartment) {
            return response()->json(['error' => 'Appartamento non trovato'], 404);
        }

        return response()->json($apartment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request, $id)
    {
        $data = $this->validation($request->all());

        $apartment = Apartment::findOrFail($id);

        $message = new Message();

        $message->fill($data);
        $message->apartment_id = $id;
        $message->save();

        return response()->json([
            'succes' => 'true',
        ]);
    }

    /**
     * Display the specified resource filtered by .
     *
     * @param  string  $city
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $city)
    {



        // $apartments = Apartment::where('city', $city)
        //     ->with('title', 'description', 'image')
        //     ->get();

        $apartments = Apartment::where('city', 'LIKE', $city . '%')
            ->orWhere('address', 'LIKE', $city . '%')
            ->orWhere('street', 'LIKE', $city . '%')
            ->with('service')
            ->get();

        foreach ($apartments as $apartment) {
            $apartment->image = $apartment->getImageUri();
        }



        return response()->json(compact('apartments'));
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:60',
                'surname' => 'required|string|max:60',
                'email' => 'required|string|max:255|email',
                'message' => 'required|string|max:65535',
            ],
            [
                'name.required' => "The name is required",
                'name.string' => "Name must be a string",
                'name.max' => "The name must have a maximum of 60 characters.",

                'surname.required' => "The surname is required",
                'surname.string' => "Surname must be a string",
                'surname.max' => "The name must have a maximum of 60 characters.",

                'email.required' => "The email is required",
                'email.string' => "Email must be a string",
                'email.max' => "The email must have a maximum of 255 characters.",
                'email.email' => "The email address must be valid",

                'message.required' => "The text is required",
                'message.string' => "Text must be a text",
                'message.max' => "The text must have a maximum of 255 characters.",
            ]
        )->validate();
        return $validator;
    }
}
