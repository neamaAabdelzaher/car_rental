<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $categories=Category::get();
        return view ('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

       
        $category=$request->validated();
        Category::create($category);
        return redirect()->route('dashboard.categories.index')->with('success', 'Operation Successfully');

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
        $category=Category::findOrFail($id);
        return view ('dashboard.categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category=$request->validated();
        Category::where('id',$id)->update($category);
        return redirect()->route('dashboard.categories.index')->with('success', 'Operation Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $category=Category::findOrFail($id);
     $cars = Car::where('category_id', $category->id)->count();
    //  dd($cars);
    if($cars > 0){
         return redirect()->route('dashboard.categories.index')->with('fail', 'can not delete category with data ');}
    else{
     
        $category->where('id',$id)->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Operation Successfully');
    }
        
    }

}
