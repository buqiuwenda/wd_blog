<?php
/**
 * Class BulletinService
 * @package App\Services
 * Author:huangzhongxi@rockfintech.com
 * Date: 2019/5/24 1:56 PM
 */
namespace App\Services;

use Log;
use App\Model\Bulletin;

class BulletinService
{

    public function getBulletinList($status = 1)
    {
        return Bulletin::query()->where('status', $status)->orderBy('priority', 'desc')->orderBy('id', 'desc')->get();
    }
}