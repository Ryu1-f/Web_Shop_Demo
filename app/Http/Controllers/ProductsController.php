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
        $param = [
            'img' => '',
            'title' => $request->title,
            'description' => $request->description,
            'cost' => $request->cost,
        ];
        if ($request->file('img')->isValid()) {
            $type = $request->file('img')->guessExtension();
            $path = $request->file('img')->storeAs(
                'public/post_images', $param['title'].'.'.$type
            );
            $param['img'] = $param['title'].'.'.$type;
            DB::connection('mysql')->insert('insert into products (img, title, description, cost) values (:img, :title, :description, :cost)', $param);
            return view('products.add');    
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = [
            'img' => file_get_contents('/Users/ryu1fukami/Desktop/bb8.jpg'),
            'title' => 'Ryu1_paranomas',
            'description' => '福岡で撮影した写真です',
            'cost' => 2000,
        ];

        DB::connection('mysql')->insert('insert into products (img, title, description, cost) values (:img, :title, :description, :cost)', $products);
        // $products = DB::connection('mysql')->insert([
        //     'img' => file_get_contents('/Users/ryu1fukami/Desktop/bb8.jpg'),
        //     'title' => 'Ryu1_paranomas',
        //     'description' => '福岡で撮影した写真です',
        //     'cost' => 2000,
        // ]);
        // return response()->json([
        //     'insert' => $products,
        // ]);
    }

    public function add(Request $request)
    {
        return view('products.add');
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
    public function edit($id)
    {
        //
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
