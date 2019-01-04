<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class UploadController extends Controller
{
    public function index()
    {
        return view('uploads');
    }

    public function store(Request $request)
    {
        $imageData = $request->get('image-data');
        $imageData2 = $request->get('second-image-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $info2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData2));
        $img1 = Image::make($info);
        $img2 = Image::make($info2);
        $img1->save(public_path('/uploads/1.png'));
        $img2->save(public_path('/uploads/2.png'));
        return $img1->response();
        dd($request->all());
    }
}
