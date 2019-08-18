<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <title>create products data</title>
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <!-- Styles -->
    </head>
    <body>
        <!-- エラーメッセージ。なければ表示しない -->
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <table>
            <form action = '/products/add' enctype="multipart/form-data" method = 'post'>
            @csrf
            <tr><th>img: </th><td><input type = 'file' name = 'img'></td></tr>
            <tr><th>title: </th><td><input type = 'text' name = 'title' placeholder="title"></td></tr>
            <tr><th>description: </th><td><input type = 'text' name = 'description' placeholder="description"></td></tr>
            <tr><th>cost: </th><td><input type = 'text' name = "cost" placeholder="cost"></td></tr>
            <tr><th></th><td><input type = 'submit' value = "send">
    </table>
    </body>
</html>
