<?php
/**
 * Class ArticleController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/17 5:41 PM
 */
namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CommentService;

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
        $lists = $this->articleService->getList();

        return view('article.index', compact('articles', 'lists'));
     }


     public function show($slug)
     {
        $article = $this->articleService->getInfoBySlug($slug);
        $this->articleService->visitorLog($article['id']);

        $commentServices = new CommentService();

        $comments = $commentServices->getList($article['id'], 'articles');
        $lists = $this->articleService->getList();

        return view('article.show', compact('article', 'comments', 'lists'));
     }

}