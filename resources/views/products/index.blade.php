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
    <?php 
    // Content-typeテーブル
    $contents_type = array(
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'bmp'  => 'image/bmp',
    );
    ?>
    <body>
        <table>
            var_dump({{ asset('/strage/app/$item->img')}});
            <tr><th>Img</th><th>Title</th><th>Description</th><th>Cost</th></tr>
            @foreach($items as $item)
                <tr>
                    <td><img src = ".{{ asset('/strage/app/$item->img')}}."></td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->cost}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
