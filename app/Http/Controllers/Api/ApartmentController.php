<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();

        $apartments = Apartment::where('visibility', true)
            ->where('user_id', $user_id->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(6);

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
