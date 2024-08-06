<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classdata;
use App\traits\Common;
use DateTime;

class ClassController extends Controller
{
    use Common;
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
        
       /* $class=['className'=> $request->className,
               'capacity'=> $request->capacity,
               'price'=> $request->price,
               'isFulled'=> isset($request->isFulled),
               'timeFrom'=> $request->timeFrom,
               'timeTo'=> $request->timeTo,
              ];*/


        $class = $request-> validate (['className'=>'required|string|max:20',
                                      'capacity'=> 'required|integer|min:1|max:30',
                                      'price'=>'required|decimal:0,2',
                                      'image'=>'required|image|mimes:jpeg,jpg,png,gif',
                                      'timeFrom'=>'required|date',
                                      'timeTo'=>'required|date',
                                    ]);
    
        $class['isFulled']= isset($request-> isFulled);
        //dd($class);
        

        $class['image']=$this->uploadFile($request->image, 'assets/images');
       
       
        Classdata::create($class);

        return redirect()->route('classes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Classdata $classes)
     {
       //dd($classes);
       // $classes= Classdata::findOrFail($class);
        //return view('class_details');
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
       /*$class=['className'=> $request->className,
       'capacity'=> $request->capacity,
       'price'=> $request->price,
       'isFulled'=> isset($request->isFulled),
       'timeFrom'=> $request->timeFrom,
       'timeTo'=> $request->timeTo,
        ];*/

        $class = $request-> validate (['className'=>'required|string|max:20',
                                       'capacity'=> 'required|integer|min:1|max:30',
                                       'price'=>'required|decimal:0,2',
                                       'image'=>'image|mimes:jpeg,jpg,png,gif',
                                       'timeFrom'=>'required',
                                       'timeTo'=>'required',
                             ]);
       
       $class['isFulled']= isset($request-> isFulled);
     // dd($class);
      
     if ($request->hasFile('image')) {
        $class['image'] = $this->uploadFile($request->image, 'assets/images');
    }
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

    
    public function restore(string $id)
    {
        Classdata::where('id', $id)->restore();

        return redirect()->route('classes.showDeleted');
    }


    public function forcedelete(string $id)
    {
        
        Classdata::where('id', $id)->forcedelete();

        return redirect()->route('classes.index');
    }


}
