<?php
/**
 * Class ArticleController
 * @package App\Http\Controllers
 * Author:huangzhongxi@rockfintech.com
 * Date: 2018/12/17 5:41 PM
 */
namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

class UserController  extends  Controller
{

    public function edit()
    {
        $user_id = \Auth::id();
        $user = User::query()->find($user_id);

        return view('user.profile', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $params = $request->all();

        $data = [];

        if(!empty($params['nickname'])){
            $data['nickname'] = $params['nickname'];
         }
        if(!empty($params['website'])){
            $data['website'] = $params['website'];
        }

        if(!empty($params['description'])){
            $data['description'] = $params['description'];
        }
        if(!empty($params['github_name'])){
            $data['github_name'] = $params['github_name'];
        }

        if($data){
            User::query()->where('id', '=', $id)->update($data);
        }

        return redirect('user/profile');
    }

    public function setting()
    {
        abort(404);
    }
}