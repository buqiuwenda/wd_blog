<?php
/**
 * get Ip
 * Created by PhpStorm.
 * User: buqiuwenda
 * Date: 2017/12/15
 * Time: 10:33
 */
namespace App\Tools;

use Illuminate\Http\Request;
use App\Tools\IPLocal\ipLocal;
class IP
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get()
    {
        $ip=$this->request->getClientIp();
        if($ip=="::1"){
            $ip="127.0.0.1";
        }
        return $ip;
    }


    public function getIpAddress($ip)
    {
        if($ip=='127.0.0.1'){
            return [
              'country'=>'',
              'province'=>'',
              'city'=>''
            ];
        }

        $ipLocal = new ipLocal();
        $ip_address=$ipLocal->find($ip);

        return [
          'country'=>$ip_address[0],
          'province'=>$ip_address[1],
          'city'=>$ip_address[2],
        ];
    }
}