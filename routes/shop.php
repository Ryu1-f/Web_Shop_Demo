<?php
Route::group(['middleware' => ['shop']], function(){
  Route::get('/product', function(){
    // 検索
  });

  Route::post('/product', function(Request $request){
    // 登録
  });

  Route::put('/update-product',function(Request $request){
    // 変更
  });
  Route::delete('/product', function(Book $book){
    //　削除
  });
});
?>
