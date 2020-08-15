<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::all();
        return view('destination.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'class_id' => 'required',
        ]);

        $destination = new Destination;
        $destination->name = $request->name;
        $destination->class_id = $request->class_id;
        $destination->price = $request->price;
        $destination->capacity = $request->capacity;
        $destination->info = $request->info;
        $destination->save();    

        return redirect('destinations')->with('status', 'Destination has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        $destination->makeHidden(['class_id']);
        return view('destination.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $classes = Classes::all();
        return view('destination.edit', compact('destination', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|min:2',
            'class_id' => 'required',
        ]);

        Destination::where('id', $destination->id)
        ->update([
            'name' => $request->name,
            'class_id' => $request->class_id,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'info' => $request->info
        ]); 

        return redirect('destinations')->with('status', 'Destination has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
