<?php
/**
 * Class CommentService
 * @package App\Services
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/20 2:41 PM
 */
namespace App\Services;

use App\Model\Comment;


class CommentService
{

    public function getList($commentableId, $commentableType)
    {
        return Comment::query()->where('commentable_id', '=', $commentableId)
            ->where('commentable_type', '=', $commentableType)->get();
    }
}