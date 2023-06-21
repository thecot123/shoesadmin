<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inform;
class InformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inform = Inform::all();
        return view('inform.index',compact('inform'));
    }
public function fe()
    {
        $inform = Inform::all();
        return view('fe.inform',compact('inform'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inform = Inform::all();
        return view('inform.create',compact('inform'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
           
        ], [
            'title.required' => 'Vui lòng nhập title sản phẩm.',
            'content.required' => 'Vui lòng nhập centent sản phẩm.',
           
        ]);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return view('admin.product.create');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);

            $inform = Inform::create([
                'title' => $request->title,
                'content' => $request->content,
                'photo' => $imageName,
            ]);
    }
$inform->save();
return redirect('/inform')->withSuccess('Inform created successfully.');
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
        
    }
}
