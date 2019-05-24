<?php
/**
 * Class ArticleController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/17 5:41 PM
 */
namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\BulletinService;
use App\Services\CommentService;

class ArticleController  extends  Controller
{

    protected $articleService;
    protected $bulletinService;

    public function __construct(ArticleService $articleService, BulletinService $bulletinService)
    {
        $this->articleService = $articleService;
        $this->bulletinService = $bulletinService;
    }

     public function index()
     {
        $articles = $this->articleService->page();
        $lists = $this->articleService->getList();

        $bulletins = $this->bulletinService->getBulletinList();

        return view('article.index', compact('articles', 'lists', 'bulletins'));
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