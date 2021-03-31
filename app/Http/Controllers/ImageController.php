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
    const IMG_MAX_KB = 500;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $uploads = Image::with('user:id,name')->select('user_id', 'img')->paginate(self::IMG_COL_NUM * self::IMG_ROW_NUM);
        $loading = asset('storage').'/uploads/loading.gif';
        $user_id = Auth::id();

        return response()->view("images/index", [
            "images" => $uploads,
            "user_id" => $user_id,
            "loading" => $loading,
        ]);
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
            'img' => 'max:'.self::IMG_MAX_KB
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
