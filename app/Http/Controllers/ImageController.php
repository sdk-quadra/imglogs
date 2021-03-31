<?php

namespace App\Http\Controllers;

//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\User;
use InterventionImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    const IMG_COL_NUM = 3;
    const IMG_ROW_NUM = 2;
    public function index()
    {
        $uploads = Image::with('user:id,name')->select('user_id', 'img')->paginate(self::IMG_COL_NUM * self::IMG_ROW_NUM);
        $loading = asset('storage').'/uploads/loading.gif';

        return response()->view("images/index", [
            "images" => $uploads,
            "loading" => $loading,
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

        $this->validateData($request);

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

        return redirect('/images')->with('image-upload-status', '画像をアップしました!');
    }
    private function validateData($request) {
        $request->validate([
            'img' => 'max:50'
        ]);
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
