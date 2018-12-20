<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class HomeController extends Controller
{
    protected $articleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
       $q = $request->get('q');

        $articles = $this->articleService->search($q);

        return view('search')->with(compact('articles'));
    }
}
