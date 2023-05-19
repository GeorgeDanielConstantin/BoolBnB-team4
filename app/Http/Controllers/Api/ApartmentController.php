<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;


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
            ->orWhere('street', 'LIKE', $city . '%')
            ->get();

        foreach ($apartments as $apartment) {
            $apartment->image = $apartment->getImageUri();
        }



        return response()->json(compact('apartments'));
    }
}
