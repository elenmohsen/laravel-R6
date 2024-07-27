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
        $classes=Classdata::get();
          
        return view('classes',compact('classes'));
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
       /* $className="grade 1A";
        $capacity= 25;
        $price= 8000;
        $isFulled= true;
        $timeFrom= (new DateTime())->format("2024-07-18 12:30:00");
        $timeTo= (new DateTime())->format("2024-07-18 7:30:00");*/
        
        $class=['className'=> $request->className,
               'capacity'=> $request->capacity,
               'price'=> $request->price,
               'isFulled'=> isset($request->isFulled),
               'timeFrom'=> $request->timeFrom,
               'timeTo'=> $request->timeTo,
              ];

        Classdata::create($class);

        return redirect()->route('classes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classes= Classdata::findOrFail($id);

        return view('class_details', compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes= Classdata::findOrFail($id);

        return view('edit_class', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //dd($request, $id);
       $class=['className'=> $request->className,
       'capacity'=> $request->capacity,
       'price'=> $request->price,
       'isFulled'=> isset($request->isFulled),
       'timeFrom'=> $request->timeFrom,
       'timeTo'=> $request->timeTo,
        ];

        Classdata::where('id', $id)->update($class);

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // return "Delete class";
       Classdata::where('id', $id)->delete();

       return redirect()->route('classes.index');

    }

    public function showDeleted()
    {
        $classes= Classdata::onlyTrashed()->get();

        return view('trashedclasses', compact('classes'));
    }
}
