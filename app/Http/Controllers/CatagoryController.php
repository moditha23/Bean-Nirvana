<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    protected $catagory;
    public function __construct()
    {
        $this->catagory = new Catagory();
    }
    public function index()
    {
        return $this->catagory->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->catagory->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->catagory->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{

}
}
