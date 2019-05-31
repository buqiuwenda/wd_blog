@extends('layouts.app')

@section('style')
    <style>
        .p_text{
            text-indent:2rem;
            word-break:break-all;
            font-size:14px
        }

        .margin_text{
            margin-left:15px;
            margin-top:10px;
        }
    </style>
@endsection
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-sm-8">
                <!-- CODE START -->
                <div class="panel panel-default">
                    <h1 class="vc-blog-title margin_text" >赞助&支持闻达君</h1>
                   <p class="p_text">
                       目前不求闻达博客运行在阿里云上，每月需要支付不菲的主机费用。此外闻达君<strong class="text-danger">每周更新一篇文章，文章涉及心理学，成长，教育</strong>等等，如果你觉得该博客对你学习，生活，工作确实提供了帮助。
                   </p>
                    <p class="p_text">此外，你可以通过支付宝或微信直接给闻达君打赏来表示支持：</p>
                    <p class="margin_text"><img src="{{ env('ALIPAY_IMAGE_URL') }}" data-filename="alipay-qrcode" style="width: 50%;"></p>
                    <p class="margin_text"><img src="{{ env('WEIXIN_IMAGE_URL') }}" data-filename="wechatpay-qrcode" style="font-family: inherit; font-style: inherit; font-weight: inherit; width: 50%;"></p>
                </div>
                <p class="p_text">以下是曾经捐赠过闻达博客的用户，闻达博客的发展离不开你们的支持，闻达君再次对你们表示感谢：</p>

              @include('widgets.sponsor-table')

              @include('widgets.comment')

                <!-- CODE END -->
            </div>
            @include('widgets.slider')
        </div>
    </div>
@endsection


@section('scripts')

@endsection


