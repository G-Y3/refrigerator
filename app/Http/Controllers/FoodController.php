<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpQuery;

class FoodController extends Controller
{
    public function create(\App\Refrigerator $refrigerator)
    {
        return view('food.create',compact('refrigerator'));
    }

    public function store(\App\Refrigerator $refrigerator)
    {
        $data = request()->validate([
            'name' => 'required',
            'production_data' => 'required',
            'shelf_life' =>'required',
        ]);



        $food = $refrigerator->foods()->create($data);

        return redirect('/refrigerators/' .$refrigerator->id);
        
    }

    public function destroy(\App\Refrigerator $refrigerator, \App\Food $food)
    {
        $food->delete();
        
        return redirect('/refrigerators/' .$refrigerator->id);
    }

    public function fastcreate(\App\Refrigerator $refrigerator)
    {
        return view('food.fastcreate',compact('refrigerator'));
    }
    
    
    public function faststore(\App\Refrigerator $refrigerator)
    {
        $fd = array(
            "リンゴ" => 86400*10,
            "バナナ" => 86400*4,
            "牛乳" => 86400*7,
            "鶏肉" => 86400*3,
            "ケーキ" => 86400*2,
            "クッキー" => 86400*5,
        );
        $data = request()->food;
        if($data ==null){
            return view('refrigerator.show',compact('refrigerator'));
        }
        
        foreach ($data as $fo) {
            $nowTime = date('Y-m-d', time());
            $safeTime = strtotime($nowTime) + $fd[$fo];
            $safedateTime = date("Y/m/d", $safeTime);
            $temp = array(
                'name' => $fo,
                'production_data' => date("Y/m/d"),
                'shelf_life' => $safedateTime,
                
            );
            $food = $refrigerator->foods()->create($temp);
        }
        return redirect('/refrigerators/' .$refrigerator->id);
    }
    public function camera(\App\Refrigerator $refrigerator)
    {
        return view('food.camera',compact('refrigerator'));
    }

    public function camerastore(\App\Refrigerator $refrigerator)
    {
        $data = request()->validate([
            'barcode' => 'required',
            'shelf_life' =>'required',
        ]);
        //$path = base_path()."/public/phpQuery-onefile.php";
        $path = "./phpQuery-onefile.php";

        require_once($path);

        $html = file_get_contents("https://www.janken.jp/goods/jk_catalog_syosai.php?jan=".$data['barcode']);

        $name =  phpQuery::newDocument($html)->find("#gname")->text();

        $temp = $temp = array(
            'name' => $name,
            'production_data' => date("Y/m/d"),
            'shelf_life' => $data['shelf_life'],
        );

        $food = $refrigerator->foods()->create($temp);

        return redirect('/refrigerators/' .$refrigerator->id);
    }
}
