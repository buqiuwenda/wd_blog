<?php
/**
 * Class ArticleController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/17 5:41 PM
 */
namespace App\Http\Controllers;

use App\Services\ArticleService;

class ArticleController  extends  Controller
{

    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

     public function index()
     {
        $articles = $this->articleService->page();

        return view('article.index', compact('articles'));
     }


     public function show($slug)
     {
        $article = $this->articleService->getInfoBySlug($slug);

        $this->articleService->visitorLog($article['id']);

        return view('article.show', compact('article'));
     }
}