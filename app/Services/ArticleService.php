<?php
/**
 * Class ArticleService
 * @package App\Services
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/18 2:40 PM
 */
namespace App\Services;

use App\Model\Article;
use App\Model\ArticleVisitor;
use App\Tools\IP;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    protected $ip;
    public function __construct(IP $ip)
    {
        $this->ip = $ip;
    }

    public function page($number = 10, $sort ='desc', $sortColumn = 'view_count')
    {
        $rows = Article::query()->with('tags','user')->where('status', '=', 1)->where('is_draft', '=', 0)
            ->orderby($sortColumn, $sort)->paginate($number);

        return $rows;
    }



    public function getInfoBySlug($slug)
    {
        $row = Article::query()->where('slug', '=', $slug)->where('status', '=', 1)->firstOrFail();
        $row->increment('view_count');
        $row['content'] = json_decode($row['content'], true);
        return $row;
    }


    public function visitorLog($article_id)
    {
        $ipLocal = $this->ip->get();
        $query = ArticleVisitor::query();

        if($this->hasArticleIp($article_id, $ipLocal)){
            $query->where('article_id', '=', $article_id)
                ->where('ip', '=', $ipLocal)->increment('clicks');
        }else{
            $data = [
               'ip' => $ipLocal,
               'article_id' => $article_id,
               'user_id' => !empty(Auth::check()) ? Auth::id() :0,
               'clicks' =>1
            ];

            $query->firstOrCreate($data);
        }

    }


    public function hasArticleIp($article_id, $ip)
    {
        return ArticleVisitor::query()->where('article_id', '=', $article_id)
            ->where('ip', '=', $ip)->count()? true:false;
    }


    public function search($key)
    {
         trim($key);

        $row = Article::query()->where('title', 'like', '%{$key}%')->orderBy('published_at', 'desc')
        ->get();

        return $row;
    }
}