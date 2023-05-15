<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
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
        $apartments = Apartment::paginate(6);
        return view('apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:60',
                'description' => 'min:5',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
                'address' => 'required|max:70',
                'latitude' => 'required|max:18',
                'longitude' => 'required|max:18',
                'rooms' => 'required|min:1',
                'bathrooms' => 'required|min:1',
                'beds' => 'required|min:1',
                'square_meters' => 'required|min:1',
                'visibility' => 'required',
            ],

            [
                'title.required' => 'The title is required.',
                'title.max' => 'The title must have a maximum of 60 characters.',

                'description.min' => 'The description must have a minimum of 5 characters.',
                
                'image.image' => 'Must be an image.',
                'image.mimes' => 'The image must be JPG, PNG, JPEG, GIF or SVG format.',

                'address.required' => 'The title is required.',
                'address.max' => 'The title must have a maximum of 70 characters.',

                'latitude.required' => 'The latitude is required.',
                'latitude.max' => 'The latitude must have a maximum of 18 characters.',

                'longitude.required' => 'The longitude is required.',
                'longitude.max' => 'The longitude must have a maximum of 18 characters.',

                'rooms.required' => 'The rooms number is required.',
                'rooms.min' => 'The rooms must be at least 1.',

                'bathrooms.required' => 'The bathrooms number is required.',
                'bathrooms.min' => 'The bathrooms must be at least 1.',


                'beds.required' => 'The beds number is required.',
                'beds.min' => 'The beds must be at least 1',


                'square_meters.required' => 'The square_meters  is required.',
                'square_meters.min' => 'The square_meters must be at least 1',

                'visibility.required' => 'The visibility is required.'

            ]
        )->validate();
        return $validator;
<<<<<<< HEAD
    
}
=======
}
>>>>>>> 475782d8869ed86538b5ac0a58471b24fb9f0f8b
