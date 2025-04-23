<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Contact;
use App\Models\Reservation;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $contacts = Contact::all();
        if ($contacts->isEmpty()) {
            return response()->json(
                [
                'message' => 'No contacts found',
                'data' => []
                ]);
        }
        return response()->json(
            [
            'message' => 'Contact list retrieved successfully',
            'data' => $contacts
            ]);
        // return response()->json(
        //     [
        //     'message' => 'Contact list retrieved successfully',
        //     'data' => [    ['id' => 1, 'name' => 'John Doe', 'email' => 'user@abc'],
        //         ['id' => 2, 'name' => 'Jane Smith', 'email' => 'user@xyz']
        //         ]
        //     ]);
            }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|max:15',
                'message' => 'required|string|max:500',
            ]);
    
            if ($validator->fails()) {
                return response()->json(
                    [
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                    ], 422);
            }
    
            $contact = Contact::create($validator->validated());
    
            return response()->json(
                [
                'message' => 'Contact created successfully',
                'data' => $contact
                ]);        
              }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(
                [
                'message' => 'Contact not found',
                'data' => []
                ], 404);
        }
        return response()->json(
            [
            'message' => 'Contact retrieved successfully',
            'data' => $contact
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(
                [
                'message' => 'Contact not found',
                'data' => []
                ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255',
            'phone' => 'sometimes|required|string|max:15',
            'message' => 'sometimes|required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                'message' => 'Validation failed',
                'errors' => $validator->errors()
                ], 422);
        }

        $contact->update($validator->validated());

        return response()->json(
            [
            'message' => 'Contact updated successfully',
            'data' => $contact
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(
                [
                'message' => 'Contact not found',
                'data' => []
                ], 404);
        }

        $contact->delete();

        return response()->json(
            [
            'message' => 'Contact deleted successfully',
            'data' => []
            ]);
    }
}
