<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        $ban = Banner::all();
        return view('banner.index',compact('ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ban = Banner::all();
        return view('banner.create',compact('ban'));
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

            $banner = new Banner();
            $banner->photo = $imageName;
            $banner->save();
        }
        session()->flash('success', 'Banner đã được lưu thành công.');

        return redirect('/banners');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::findOrFail($banner->id);

        // Xóa banner
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Xóa Banner thành công!');
    }
}
