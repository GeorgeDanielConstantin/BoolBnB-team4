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
    public function show($id)
    {
        $apartment = Apartment::where('id', $id);
        if (!$apartment) return response(null, 404);

        $apartment->image = $apartment->getImageUri();

        return response()->json($apartment);
    }
}
