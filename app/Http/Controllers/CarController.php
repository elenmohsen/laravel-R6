<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\traits\Common;
use App\Models\Category; 
//use App\Rules\GreaterThanTen;

class CarController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=car::get();
        // dd($cars[0]->category->category_name);

        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('add_car');
        $categories= Category::select('id','category_name')->get();
        return view('add_car',compact('categories'));
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
               'price'=> 'required|decimal:0,2',
               'image'=>'required|mimes:jpeg,jpg,png,gif|max:2000',
               'published'=>'boolean',
               'category_id'=>'required',
             ]);
      //  dd($data);
        //$data['published']= isset($request-> published);
        $data['image']=$this->uploadFile($request->image, 'assets/images/cars');
        
        car::create($data);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $car= car::with('category')->findOrFail($id);
       //dd($car[0]->category->category_name);
        return view ('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
       //$categories= Category::findOrFail($id);
        $categories= Category::select('id','category_name')->get();
        $car= car::findOrFail($id);
        return view ('edit_car', compact('car'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) 
    {
       // dd($request , $id);
        /*$data= ['carTitle'=> $request-> carTitle,
                'description'=> $request-> description,
                'price'=> $request-> price,
                'published'=> isset($request-> published),
               ];*/

               $data = $request-> validate (['carTitle'=>'required|string',
                                             'description'=> 'required|string|max:100',
                                             'price'=>'required|decimal:1',
                                              'image'=>'image|mimes:jpeg,jpg,png,gif|max:2000',
                                              'published'=>'boolean',
                                              'category_id'=>'required',
                      ]);
              //  dd($data);
              // $data['published']= isset($request-> published);
               if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');
            }
                  //  Category::where('id',$category_id)->update($data);
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
