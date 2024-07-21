<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classdata;
use DateTime;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class_data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $className="grade 1A";
        $capacity= 25;
        $price= 8000;
        $isFulled= true;
        $timeFrom= (new DateTime())->format("2024-07-18 12:30:00");
        $timeTo= (new DateTime())->format("2024-07-18 7:30:00");

        Classdata::create([
           'className' => $className,
           'capacity' => $capacity,
            'price'=> $price,
            'isFulled'=> $isFulled,
            'timeFrom'=> $timeFrom,
            'timeTo'=> $timeTo,
        ]);

        return "data added successfully";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
