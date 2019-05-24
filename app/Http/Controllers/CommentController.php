<?php
/**
 * Class ArticleController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/17 5:41 PM
 */
namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;

class CommentController  extends  Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|string|max:255',
            'commentable_id' => 'required|min:1',
            'commentable_type' => 'required|string|in:articles,discussions',
            'slug'    => 'required|string|max:255'
        ]);

        $params = $request->all();

        $params['user_id'] = \Auth::id();
        $params['content'] = strip_tags($params['content']);

        $model = new Comment();
        $model->fill($params);
        $id = $model->save();

        if(!$id){
            return back()->withErrors(['msg' => '发布评论失败，请重试']);
        }

        if($params['commentable_id'] == env('ARTICLE_ID')){
            return redirect('sponsor');
        }else{
            return redirect($params['slug']);
        }
    }
}