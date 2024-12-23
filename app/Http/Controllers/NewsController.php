<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect()->route('home');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article', compact('article'));
    }
}
