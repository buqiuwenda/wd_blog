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
use App\Tools\IPLocal\itbdw\IpLocation;


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
        if($this->check_ip($ip)){
           return  IpLocation::getLocation($ip);
        }

        return [];
    }


     public function check_ip($ip){
        if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)){
            return true;
        }elseif($ip == '127.0.0.1'){
            return false;
        }

        return false;
    }

}