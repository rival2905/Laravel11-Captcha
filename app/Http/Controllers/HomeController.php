<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Drivers\Gd\Driver;
use SebastianBergmann\CodeCoverage\Driver\Driver as DriverDriver;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'captcha' => 'required|captcha',
        ]);

        $path = $request->file('gambar')->store('upload', 'public');

        $formData = new Home();
        $formData->nama = $request->nama;
        $formData->email = $request->email;
        $formData->telp = $request->telp;
        $formData->alamat = $request->alamat;
        $formData->gambar = $path;
        $formData->save();

        return redirect()->back()->with('success', 'Data has been successfully saved');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
