<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <title>register products data</title>
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <!-- Styles -->
    </head>
    <body>
        <ul>
            <li><a href="index">商品一覧</a></li>
            <li><a href="add">商品追加</a></li>
            <li><a href="edit">Contact</a></li>
            <li><a href="about.asp">About</a></li>
        </ul>
        <div class = "add_items">
            <!-- エラーメッセージ。なければ表示しない -->
            @if ($errors->any())
                <div class = "error_message">入力に誤りがあります</div>
                <!-- <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
            @else
                <div>{{$instruction ?? '登録内容を送信してください'}}</div>
            @endif
                <form action = '/products/add' enctype="multipart/form-data" method = 'post'>
                {{csrf_field()}}
                <span class="must">必須</span>画像<br>
                <input type = 'file' name = 'img'><br>
                <span class="must">必須</span>タイトル(最大100文字)<br>
                <input type = 'text' name = 'title' placeholder="title"><div class = "required_item"></div><br>
                <span class="must">必須</span>説明文(最大500文字)<br>
                <input type = 'text' name = 'description' placeholder="description"><br>
                <span class="must">必須</span>価格(円)<br>
                <input type = 'text' name = "cost" placeholder="cost"><br>
                <button class = "send_button" type = 'submit' value = "send">追加</button>
        </div>
    </body>
</html>
