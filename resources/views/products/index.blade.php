<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <title>show products data</title>
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <!-- Styles -->
    </head>
    <body>
        <ul>
            <li><a href="index">商品一覧</a></li>
            <li><a href="add">商品追加</a></li>
            <li><a href="contact.asp">Contact</a></li>
            <li><a href="about.asp">About</a></li>
        </ul>
        <table align = "center" class = "item_lists">
            <tr><th>Img</th><th>Title</th><th>Description</th><th>Cost</th></tr>
            @foreach($items as $item)
                <tr>
                    <!--  var_dump({{storage_path('app/$item->img')}}); -->
                    <td><img width="300vw" src ="/storage/post_images/{{$item->img}}"></td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->cost}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
