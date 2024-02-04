<?php

namespace App\Http\Controllers\dashboard;

use App\Traits\File;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialsController extends Controller
{

    use File;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonial::get();
        return view('dashboard.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.testimonials.create');
 
    } 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $testimonial = $request->validated();
        $imagePath = 'assets/dashboard/images/testimonials';
        $imageName = File::uploadImage($request, $imagePath);
        $testimonial['image'] = $imageName;
        $testimonial['published'] = isset($request['published']);
        Testimonial::create($testimonial);
        return redirect()->route('dashboard.testimonials.index')->with('success', 'Operation Successfully');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, string $id)
    {
        $testimonialData = $request->validated();
        $testimonialData ['published'] = isset($request['published']);
        
        // if select new image
        if ($request->hasFile('image')) {
            //upload image
            $imagePath = 'assets/dashboard/images/testimonials';
            $imageName = File::uploadImage($request, $imagePath);
            // remove old image
            $testimonial= Testimonial::findOrFail($id);
            $oldFile = $testimonial->image;
            $Path = "assets/dashboard/images/testimonials/{$oldFile}";
            $deletedFile = File::DeleteImage($Path);
            if ($deletedFile) {

                $testimonialData ['image'] = $imageName;

            }
        }
       
        Testimonial::where('id',$id)->update($testimonialData);

        return redirect()->route('dashboard.testimonials.index')->with('success', 'Operation Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $testimonial =Testimonial::findOrFail($id);
        // remove old image
        $oldFile = $testimonial->image;
        $Path = "assets/dashboard/images/testimonials/{$oldFile}";
        $deletedFile = File::DeleteImage($Path);
        if ($deletedFile) {
            $testimonial->where('id', $id)->delete();
            return redirect()->route('dashboard.testimonials.index')->with('success', 'Operation Successfully');
        }
    }
    
}
