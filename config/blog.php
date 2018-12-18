<?php

return [
    // Mate
    'mate'=>[
        'keyword'=>'bu qiu wen da,blog,Laravel,vue.js',
        'description'=>'Change starts with experience.'
    ],

    // Default Avatar
    'default_avatar'=>env('DEFAULT_AVATAR')?:'/images/default.png',

    // Default Icon
    'default_icon' => env('DEFAULT_ICON')?:'/images/favicon.ico',

    // Mail Notification
    'mail_notification'=>env('MAIL_NOTIFICATION')?:false,

    'footer'=>[
        'github'=>[
           'open'=>true,
           'url'=>'https://github.com/buqiuwenda'
        ],
        'mate'=>' BQWD Blog Powered By bu qiu wen da.',
        'icpno'=> ' 赣ICP备16004317号 '
    ],

    // Social Share
    'social_share' => [
        'article_share'    => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'weibo,qq,wechat',
        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'weibo,qq,wechat',
    ],

    // Article
    'article'=>[
        'title'=>' Change starts with experience.',
        'description'=>'Change starts from experience, experience life, experience work. ',
        'number'=>15,
        'sort' =>'desc',
        'sortColumn'=>'published_at'
    ],

    // Discussion
    'discussion'=>[
        'number'=>20,
        'sort' =>'desc',
        'sortColumn'=>'created_at'
    ],

    // Visitor
    'visitor_log'=>[
        'interval'=>env('VISITOR_LOG_TIME')?:300,
        'is_open'=>env('VISITOR_IS_OPEN')?:false,
    ],

    // Baidu
    'baidu'=>[
      'statistics'=>env('BAIDU_STATISTICS')?:false
    ],

    // License
     'license' => 'Powered By bu qiu wen da.<br/>This article is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.',

];