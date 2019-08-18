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
            <span class="must">必須</span>タイトル<br>
            <input type = 'text' name = 'title' placeholder="title"><div class = "required_item"></div><br>
            <span class="must">必須</span>説明文<br>
            <input type = 'text' name = 'description' placeholder="description"><br>
            <span class="must">必須</span>価格(円)<br>
            <input type = 'text' name = "cost" placeholder="cost"><br>
            <button class = "send_button" type = 'submit' value = "send">追加</button>
        <!-- <table>
            <form action = '/products/add' enctype="multipart/form-data" method = 'post'>
            {{csrf_field()}}
            <tr><th>img: </th><td><input type = 'file' name = 'img'>※入力必須</td></tr>
            <tr><th>title: </th><td><input type = 'text' name = 'title' placeholder="title"><div class = "required_item">※入力必須</div></td></tr>
            <tr><th>description: </th><td><input type = 'text' name = 'description' placeholder="description">※入力必須</td></tr>
            <tr><th>cost: (円) </th><td><input type = 'text' name = "cost" placeholder="cost">※入力必須</td></tr>
            <th class = "send_button_th"><td class = "send_button"><input type = 'submit' value = "send"></td></th>
        </table> -->
    </body>
</html>
