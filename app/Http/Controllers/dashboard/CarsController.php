<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Car;
use App\Traits\File;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarsController extends Controller
{
    use File;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return view('dashboard.cars.index', compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select("id", "category_name")->get();
        return view('dashboard.cars.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        $car = $request->validated();
        $imagePath = 'assets/dashboard/images/cars';
        $imageName = File::uploadImage($request, $imagePath);
        $car['image'] = $imageName;
        $car['is_active'] = isset($request['is_active']);
        $car['user_id']=auth()->user()->id;
        Car::create($car);
        return redirect()->route('dashboard.cars.index')->with('success', 'Operation Successfully');
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
        $car = Car::findOrFail($id);
        $categories = Category::select("id", "category_name")->get();
        return view('dashboard.cars.edit', compact('categories', 'car'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        $carData = $request->validated();
        $carData['is_active'] = isset($request['is_active']);
        
        // if select new image
        if ($request->hasFile('image')) {
            //upload image
            $imagePath = 'assets/dashboard/images/cars';
            $imageName = File::uploadImage($request, $imagePath);
            // remove old image
            $car = Car::findOrFail($id);
           $oldFile = $car->image;
            $Path = "assets/dashboard/images/cars/{$oldFile}";
            $deletedFile = File::DeleteImage($Path);
            if ($deletedFile) {

                $carData['image'] = $imageName;

            }
        }
       
        Car::where('id',$id)->update($carData);

        return redirect()->route('dashboard.cars.index')->with('success', 'Operation Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        // remove old image
        $oldFile = $car->image;
        $Path = "assets/dashboard/images/cars/{$oldFile}";
        $deletedFile = File::DeleteImage($Path);
        if ($deletedFile) {
            $car->where('id', $id)->delete();
            return redirect()->route('dashboard.cars.index')->with('success', 'Operation Successfully');
        }
    }
}
