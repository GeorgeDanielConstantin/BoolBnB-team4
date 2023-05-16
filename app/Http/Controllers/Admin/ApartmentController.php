<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

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
        // dd($user_id);
        $apartments = Apartment::where('user_id', $user_id->id)->paginate(6);
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        $apartment = new Apartment;
        $services = Service::all();
        return view('admin.apartments.form', compact('apartment', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        //API KEY MIA - DANIELE
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $data['address'] . '.json?key=RRPZC1QxF3OriyrpAx5Cbd2ap0dpAhAk');
        $jsonData = $response->json();
        $results = $jsonData['results'];
        $position = $results[0]['position'];




        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('uploads/apartments', $data['image']);
            $data['image'] = $img_path;
        } else {
            $data['image'] = 'https://www.frosinonecalcio.com/wp-content/uploads/2021/09/default-placeholder.png';
        }



        $user_id = Auth::user()->id;
        $apartment = new Apartment;
        $apartment->fill($data);
        $apartment->latitude = $position['lat'];
        $apartment->longitude = $position['lon'];
        $apartment->user_id = $user_id;
        $apartment->save();

        if (Arr::exists($data, "services")) $apartment->service()->attach($data["services"]);
        return redirect()->route('admin.apartments.show', $apartment)
            ->with('message_content', "Apartment $apartment->id creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        $apartment_services = $apartment->service->pluck('id')->toArray();
        return view('admin.apartments.form', compact('apartment', 'services', 'apartment_services'))
        ->with('message_content', "Apartment $apartment->id creato con successo");
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
        $data = $this->validation($request->all());

        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $data['address'] . '.json?key=RRPZC1QxF3OriyrpAx5Cbd2ap0dpAhAk');
        $jsonData = $response->json();
        $results = $jsonData['results'];
        $position = $results[0]['position'];


        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('uploads/shoes', $data['image']);
            $data['image'] = $img_path;
        } else {
            $data['image'] = 'https://www.frosinonecalcio.com/wp-content/uploads/2021/09/default-placeholder.png';
        }

        $apartment->fill($data);
        $apartment->latitude = $position['lat'];
        $apartment->longitude = $position['lon'];
        $apartment->save();

        if (Arr::exists($data, "services"))
            $apartment->service()->sync($data["services"]);
        else
            $apartment->service()->detach();

        return redirect()->route('admin.apartments.show', compact('apartment'))
        ->with('message_content', "Post $apartment->id modificato con successo");
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
        return redirect()->route('admin.apartments.index');
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
                'latitude' => 'max:18',
                'longitude' => 'max:18',
                'rooms' => 'required|min:1',
                'bathrooms' => 'required|min:1',
                'beds' => 'required|min:1',
                'square_meters' => 'required|min:1',
                'visibility' => '',
                'services' => 'nullable|exists:services,id'
            ],

            [
                'title.required' => 'The title is required.',
                'title.max' => 'The title must have a maximum of 60 characters.',

                'description.min' => 'The description must have a minimum of 5 characters.',

                'image.image' => 'Must be an image.',
                'image.mimes' => 'The image must be JPG, PNG, JPEG, GIF or SVG format.',

                'address.required' => 'The address is required.',
                'address.max' => 'The address must have a maximum of 70 characters.',

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

                'visibility.required' => 'The visibility is required.',
                'services.exists' => 'I servizi selezionati non sono validi'

            ]
        )->validate();
        return $validator;
    }
}