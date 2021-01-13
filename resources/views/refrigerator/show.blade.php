@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $refrigerator->name }}</div>
                <div class="card-body">
                    <div><a href="/refrigerators/{{ $refrigerator->id}}/foods/create" class="btn btn-dark">Add food</a></div>
                    <div class="mt-2"><a href="/refrigerators/{{ $refrigerator->id}}/foods/fastcreate" class="btn btn-dark">Add food Fast</a></div>
                    <div class="mt-2"><a href="/refrigerators/{{ $refrigerator->id}}/foods/camera" class="btn btn-dark">camera</a></div>
                </div>

                
            </div>

            @foreach ($refrigerator->foods as $food)
                <div class="card mt-4">
                    <div class="card-header">{{ $food->name }}
                        <div>
                            <a href="https://park.ajinomoto.co.jp/recipe/search/?search_word={{ $food->name }}" target="cookbook"><button>レシピ</button></a>
                        </div>
                        <div class="mt-2 ">

                            <form action="/refrigerators/{{ $refrigerator->id}}/foods/{{ $food->id}}" method = "post">
                                @method('DELETE')
                                @csrf
        
                                <button>Delete</button>
                            </form>
                        </div>
                        
                    
                    </div>

                    <div class="card-body">
                        <li>製造日： {{$food->production_data}}</li>
                        <li>賞味期限： {{$food->shelf_life}}</li>
                        <?php
                            $nowTime = date('Y-m-d', time());
                            if(strtotime($food->shelf_life) - strtotime($nowTime) < 0 ){
                                
                                echo '<p style="font-size:30px;color:red">賞味期限が切れた</p>';
                            }else if(strtotime($food->shelf_life) - strtotime($nowTime) < 86400){
                                echo 'あと1日で賞味期限が切れる';
                            }else {
                                echo 'まだ大丈夫です';
                            }
                        ?>
                    </div>
                </div>
                
            @endforeach
        
        </div>
    </div>
</div>
@endsection
