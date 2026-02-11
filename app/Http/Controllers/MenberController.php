<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "index method called";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create method called";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store method called";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show method called for id: ";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit method called for id: ";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update method called for id: ";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy method called for id: ";
    }
}
