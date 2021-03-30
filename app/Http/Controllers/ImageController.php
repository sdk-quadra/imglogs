<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\User;
use InterventionImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $uploads = Image::with('user:id,name')->get(['user_id', 'img']);

        return response()->view("images/index", [
            "images" => $uploads
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required|file|image|mimes:png,jpeg,jpg,gif'
        ]);

        $upload_image = $request->file('img');

        $user_id = Auth::id();

        if($upload_image) {
            $path = $upload_image->store('uploads','public');
            $storage_path = storage_path('app/public/'.$path);
            $img_fit = InterventionImage::make($storage_path)->fit(240);
            $save = $img_fit->save($storage_path, 100);

            if($save){
                Image::create([
                    "user_id" => $user_id,
                    "img" => $path
                ]);
            }
        }

        return redirect('/images');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
