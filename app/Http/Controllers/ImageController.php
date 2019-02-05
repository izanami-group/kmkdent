<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $imagePath = 'article-files/' . time() . 'jpg';
        $img = Image::make($request->image->getRealPath())->stream('jpg', 80);

        Storage::disk('public')->put($imagePath, $img);


        return response()->json(['default' => Storage::disk('public')->url($imagePath)]);
    }
}
