<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $cate = Category::all();
     return view('category.index',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('category.create');
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

        $cate = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        $cate->save();
        return redirect('categorys')->withSuccess('Category create successfully.');
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
        $cate = Category::findOrFail($id);
        return view('category.edit', compact('cate'));
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

        $cate = Category::findOrFail($id);
        $cate->update($request->all());
        return redirect('categorys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        return redirect('categorys')->with('success', 'Xóa Category thành công!');;

    }
}
