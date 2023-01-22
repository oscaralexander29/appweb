<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Proyect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proyects = Proyect::orderBy('id', 'desc')->paginate(5);

        return view('proyects.index', ['proyects' => $proyects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::orderBy('id', 'desc')->get();
        return view('proyects.create', ['category' => $category]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required|min:50',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->file->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->file->storeAs('public/images', $imageName);
        $proyectData = ['title' => $request->title, 'category_id' => $request->category,'content' => $request->content, 'image' => $imageName];
        Proyect::create($proyectData);
        return redirect('/proyects')->with(['message' => 'Proyect added successfully!','status' => 'success']);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function show(Proyect $proyect)
    {
        //
        return view('proyects.show', ['proyect' => $proyect]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyect $proyect)
    {
        //
        $category = Category::orderBy('id', 'desc')->get();
        return view('proyects.edit', ['proyect' => $proyect,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyect $proyect)
    {
        //
        $imageName = '';
        if ($request->hasFile('file')) {
        $imageName = time() . '.' . $request->file->extension();
        $request->file->storeAs('public/images', $imageName);
        if ($proyect->image) {
        Storage::delete('public/images/' . $proyect->image);
        }
        } else {
        $imageName = $proyect->image;
        }
        $proyectData = ['title' => $request->title, 'category_id' => $request->category,'content' => $request->content, 'image' => $imageName];
        $proyect->update($proyectData);
        return redirect('/proyects')->with(['message' => 'Proyect updated successfully!','status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyect $proyect)
    {
        //
        Storage::delete('public/images/' . $proyect->image);
    $proyect->delete();
    return redirect('/proyects')->with(['message' => 'Proyect deleted successfully!','status' => 'info']);
    }
}
