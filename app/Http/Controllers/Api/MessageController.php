<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $message = new Message();
        
        $message->fill($data);
        $message->save();

        return response()->json([
            'succes' => 'true',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:60',
                'surname' => 'required|string|max:60',
                'email' => 'required|string|max:255|email',
                'text' => 'required|string|max:65535',
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
                
               'text.required' => "The text is required", 
               'text.string' => "Text must be a text",
               'text.max' => "The text must have a maximum of 255 characters.",
            ]
        )->validate();
        return $validator;
    }
}