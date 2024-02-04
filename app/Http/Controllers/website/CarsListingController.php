<?php

namespace App\Http\Controllers\website;

use App\Models\Car;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reply;

class CarsListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::paginate(6);
        $testimonials=Testimonial::paginate(3);
        return view('website.listing.index',compact('cars','testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $categories=Category::get();
        $car=Car::findOrFail($id);
        $comments=Comment::get();
        $replies=Reply::get();
       return view('website.listing.carDetails',compact('car','categories','comments','replies'));
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
