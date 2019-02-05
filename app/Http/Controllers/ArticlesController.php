<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::orderBy('created_at', 'desc')->get();
        return view('dashboard.articles.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $imagePath = NULL;

        if ($request->has('cover') === true) {
            $imagePath  = 'articles/'. time() .'.jpg';
            $img = Image::make($request->cover->getRealPath())->crop(250, 250)->stream('jpg', 100);

            Storage::disk('public')->put($imagePath, $img);
        }

        $article = new Article;
        $article->fill($request->except(['_token']));
        $article->image = $imagePath;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function show(Article $article)
    // {
    //     dd($article);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit')->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $imagePath = $article->image;

        if ($request->has('cover') === true) {
            // First, let's delete old image from storage...
            Storage::disk('public')->delete($article->image);

            $imagePath  = 'articles/'. time() .'.jpg';
            $img = Image::make($request->cover->getRealPath())->crop(250, 250)->stream('jpg', 100);

            Storage::disk('public')->put($imagePath, $img);
        }

        $article->fill($request->except(['_token']));
        $article->image = $imagePath;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
