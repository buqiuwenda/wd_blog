<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use SimpleXMLElement;
use Log;

class HomeController extends Controller
{
    protected $articleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
       $q = $request->get('q');

        $articles = $this->articleService->search($q);

        return view('search')->with(compact('articles'));
    }


    public function notify_xml(Request $request)
    {

        $contentType = $request->getContentType();
        if($contentType == 'xml'){
            $params = file_get_contents('php://input');
        }else{
            $params = $request->all();
        }

        Log::info('async notify accept', $params);

        if($contentType == 'xml'){
            return response($this->toXml([
                                      'return_code' => 'SUCCESS',
                                      'return_msg' => 'OK'
                                  ]));
        }else{
            return response(['msg' => 'success']);

        }
    }



    public function toXml(array $params)
    {

        $xml=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="no"?><xml/>');
        foreach ($params as $key=>$val)
        {
            $xml->addChild($key, $val);
        }

        return $xml->asXML();

    }


}
