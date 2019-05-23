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
use App\Model\IPInfo;
use Log;
use App\Model\Bulletin;

class ArticleService
{
    protected $ip;
    public function __construct(IP $ip)
    {
        $this->ip = $ip;
    }

    public function page($number = 10, $sort ='desc', $sortColumn = 'updated_at')
    {
        $rows = Article::query()->where('status', '=', 1)->where('is_draft', '=', 0)
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
            $this->storeIPInfo($ipLocal);
        }

    }


    public function hasArticleIp($article_id, $ip)
    {
        $start_date = date('Y-m-01 00:00:00');

        $d =date('t') - date('j');
        $end_date = date('Y-m-d 23:59:59', strtotime("+{$d} day"));

        return ArticleVisitor::query()->where('article_id', '=', $article_id)
            ->where('created_at','>=', $start_date)->where('created_at', '<=', $end_date)
            ->where('ip', '=', $ip)->count()? true:false;
    }


    public function search($key)
    {
        $key= trim($key);

        $row = Article::query()->where('status', '=', 1)->where('is_draft', '=', 0)
            ->where('title', 'like', '%'.$key.'%')->orderBy('published_at', 'desc')
            ->paginate(10);

        return $row;
    }

    public function getList($number = 6, $sort ='desc', $sortColumn = 'id')
    {
        $rows = Article::query()->where('status', '=', 1)->where('is_draft', '=', 0)
            ->orderBy($sortColumn, $sort)->take($number)->get();

        return $rows;
    }


    public function storeIPInfo($ip)
    {
        try{
            $ip_data = $this->ip->getIpAddress($ip);

            if($ip_data){
                Log::info('ip_data:'.json_encode($ip_data));
                $info = IPInfo::query()->where('ip', '=', $ip)->first();

                if(empty($info)){
                    $model = new IPInfo();
                    $model->fill($ip_data);
                   $id = $model->save();

                   if($id){
                       Log::info('add ip info success');
                   }else{
                       Log::info('add ip info fail');
                   }
                }
            }
        }catch(\Exception $exception){
            Log::info('exception message'.$exception->getMessage());
        }
    }



    public function getBulletinList($status = 1)
    {
        return Bulletin::query()->where('status', $status)->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
    }
}