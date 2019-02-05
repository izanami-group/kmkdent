<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarouselRequest;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.carouselImages.index')->withImages(CarouselImage::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.carouselImages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {
        $imagePath  = 'carousel/'. time() .'.jpg';
        $img = Image::make($request->cover->getRealPath())
            ->crop(config('carousel.width'), config('carousel.height'))
            ->stream('jpg', 100);

        Storage::disk('public')->put($imagePath, $img);

        $carouselImage = new carouselImage;
        $carouselImage->fill($request->except(['_token']));
        $carouselImage->src = $imagePath;
        $carouselImage->save();

        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    // public function show(CarouselImage $carouselImage)
    // {
    //     dd($carouselImage);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CarouselImage $carouselImage)
    {
        return view('dashboard.carousel.edit')->withImage($carouselImage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselRequest $request, CarouselImage $carouselImage)
    {
        $carouselImage->fill($request->except(['_token', 'src']));
        $carouselImage->save();

        return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselImage $carouselImage)
    {
        Storage::disk('public')->delete($carouselImage->src);
        $carouselImage->delete();

        return redirect()->route('carousel.index');
    }
}
