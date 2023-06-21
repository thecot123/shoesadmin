<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $slider = Slider::all();
        return view('slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slider = Slider::all();
        return view('slider.create',compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
     {
         if ($request->hasFile('photo')) {
             $file = $request->file('photo');
             $extension = $file->getClientOriginalExtension();
             $allowedExtensions = ['jpg', 'jpeg', 'png'];
     
             if (!in_array($extension, $allowedExtensions)) {
                 return redirect()->back()->withErrors('Định dạng hình ảnh không hợp lệ.');
             }
     
             $imageName = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('images'), $imageName);
     
             $slider = new Slider();
             $slider->photo = $imageName;
             $slider->save();
         }
     
         session()->flash('success', 'Slider đã được lưu thành công.');
     
         return redirect('/sliders');
     }
     

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $banner = Slider::findOrFail($slider->id);

        // Xóa banner
        $banner->delete();
        return redirect()->route('slider.index')->with('success', 'Xóa Slider thành công!');
    }
}
