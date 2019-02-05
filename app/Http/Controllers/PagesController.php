<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.index')->withArticles($articles);
    }
}
