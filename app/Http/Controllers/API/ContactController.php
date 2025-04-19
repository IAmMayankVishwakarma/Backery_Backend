<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            [
            'message' => 'Contact list retrieved successfully',
            'data' => [    ['id' => 1, 'name' => 'John Doe', 'email' => 'user@abc'],
                ['id' => 2, 'name' => 'Jane Smith', 'email' => 'user@xyz']
                ]
            ]);
            }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(
            [
            'message' => 'Contact created successfully',
            'data' => ['id' => 3, 'name' => $request->name, 'email' => $request->email]
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            [
            'message' => 'Contact retrieved successfully',
            'data' => ['id' => $id, 'name' => 'John Doe', 'email' => 'user@abc']
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(
            [
            'message' => 'Contact updated successfully',
            'data' => ['id' => $id, 'name' => $request->name, 'email' => $request->email]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(
            [
            'message' => 'Contact deleted successfully',
            'data' => ['id' => $id]
            ]);
    }
}
