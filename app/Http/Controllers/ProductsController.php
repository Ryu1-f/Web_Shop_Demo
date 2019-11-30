<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\DB;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = DB::connection('mysql')->select('select * from products');
        return view('products.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //validation
        $this->validate($request, [
            'img'  => 'required|file|image',
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'cost' => 'required|integer',            
        ],[
            'img.required' => '画像は必須項目です',
            'img.image' => '画像ファイルを指定してください',
            'title.required' => 'タイトルは必須項目です',
            'title.max' => 'タイトルは最大100文字です',
            'description.required' => '説明文は必須項目です',
            'description.max' => '説明文は最大500文字です',
            'cost.required' => '金額は必須項目です',
            'cost.integer' => '金額は整数指定です',            
        ]);

        // dd($request->all()); // 入力値を表示
        if ($request->img != null && $request->title != null && $request->description != null && $request->cost != null) {
            $param = [
                'img' => '',
                'title' => $request->title,
                'description' => $request->description,
                'cost' => $request->cost,
            ];
            //whereを追記するとエラーに
            $count = DB::connection('mysql')->select('select id from products where title = :title', ['title' => $request->title]);
            if($count == NULL)
            {
                $type = $request->file('img')->guessExtension();
                $path = $request->file('img')->storeAs(
                    'public/post_images', $param['title'].'.'.$type
                );
                $param['img'] = $param['title'].'.'.$type;
                DB::connection('mysql')->insert('insert into products (img, title, description, cost) values (:img, :title, :description, :cost)', $param);
                return redirect('products/index');    
            }else
            {
                $instruction = "その商品はすでに登録されています。";
                return view('products.add', ['instruction' => $instruction]);        
            }
        } else{
            $instruction = "記入していない項目があります。";
            return view('products.add', ['instruction' => $instruction]);    
        }
    }
    // $request->file('img')->isValid() || 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //test
        $products = [
            'img' => file_get_contents('/Users/ryu1fukami/Desktop/bb8.jpg'),
            'title' => 'Ryu1_paranomas',
            'description' => '福岡で撮影した写真です',
            'cost' => 2000,
        ];

        DB::connection('mysql')->insert('insert into products (img, title, description, cost) values (:img, :title, :description, :cost)', $products);
        // return response()->json([
        //     'insert' => $products,
        // ]);
    }

    public function add(Request $request)
    {
        $instruction = "formを埋めて送信して下さい";
        return view('products.add', ['instruction' => $instruction]);    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $param = ['id' => $request -> id];
        $items = DB::select('select * from products where id = :id', $param);
        if($items != null)
        {
            // var_dump(array_column($items, 'img')[0]);
            // var_dump(array_column($items, 'id'));
            var_dump($items[0] -> img);
            return view('products.edit', ['form' => $items[0]]);    
        }else
        {
            return redirect('/products/unknown');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
