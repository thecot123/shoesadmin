<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
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
       $brand = Brand::all();
       return view('brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',

        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'slug.required' => 'Vui lòng nhập slug sản phẩm.',

        ]);

        $brand = Brand::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        $brand->save();
        return redirect('brands')->withSuccess('Brand create successfully.');

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
        $brand =Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',

        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'slug.required' => 'Vui lòng nhập slug sản phẩm.',

        ]);
        $brand =Brand::findOrFail($id);
            $brand->update($request->all());
            return redirect('brands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand =Brand::findOrFail($id);
         $brand->delete();
         return redirect('brands')->with('success', 'Xóa Brand thành công!');;
        }

}
