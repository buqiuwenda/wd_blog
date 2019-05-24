<?php
/**
 * Class SponsorController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2019/5/24 1:45 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BulletinService;
use App\Services\ArticleService;
use App\Model\SponsorWater;
use App\Services\CommentService;

class SponsorController extends Controller
{

    private $payMode = [
        'alipay' => '支付宝',
        'weixin' => '微信'
    ];

    protected $bulletinService;
    protected $articleService;
    protected $commentService;

    public function __construct(BulletinService $bulletinService,
        ArticleService $articleService, CommentService $commentService)
    {
        $this->bulletinService = $bulletinService;
        $this->articleService = $articleService;
        $this->commentService = $commentService;
    }

    public function index(Request $request)
    {

        $query = SponsorWater::query()->where('status', 1);

        if(!empty($request->get('keyword'))){
            $query->where('nickname', 'like', '%'.$request->get('keyword').'%');
        }

        $limit = !empty($request->get('limit')) ? $request->get('limit') : 5;
        $rows = $query->orderBy('sponsor_date', 'desc')->orderBy('id', 'desc')->paginate($limit);
        $rows = $rows->appends($request->toArray());


        $lists = $this->articleService->getList();
        $bulletins = $this->bulletinService->getBulletinList();

        $article_id = env('ARTICLE_ID');
        $article = $this->articleService->getInfoById($article_id);

        $comments = $this->commentService->getList($article_id, 'articles');



        return view('sponsor.index')->with([
            'lists' => $lists,
            'bulletins' => $bulletins,
            'pay_modes' => $this->payMode,
            'rows' => $rows,
            'pageSizes' => [5,10,20,50,],
            'article'  => $article,
            'comments' => $comments

                                           ]);
    }
}