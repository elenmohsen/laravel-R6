<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=car::get();

        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
      /*  $carTitle="bmw";
        $price= 200;
        $description= "test";
        $published= true;*/

       $data = $request-> validate (['carTitle'=>'required|string',
               'description'=> 'required|string|max:100',
               'price'=>'required|decimal:1',
             ]);
      //  dd($data);
        $data['published']= isset($request-> published);
        car::create($data);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car= car::findOrFail($id);
        return view ('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car= car::findOrFail($id);
        return view ('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($request , $id);
        $data= ['carTitle'=> $request-> carTitle,
                'description'=> $request-> description,
                'price'=> $request-> price,
                'published'=> isset($request-> published),
               ];

        car::where('id', $id)->update($data);

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return "Delete car";
        car::where('id', $id)->delete();

        return redirect()->route('cars.index');
    }

    public function showDeleted()
    {
        $cars= car::onlyTrashed()->get();

        return view('trashedcars', compact('cars'));
    }

    public function restore(string $id)
    {
        car::where('id', $id)->restore();

        return redirect()->route('cars.showDeleted');
    }

    public function forcedelete(string $id)
    {
        //return "Delete car";
        car::where('id', $id)->forcedelete();

        return redirect()->route('cars.index');
    }
}
