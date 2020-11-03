@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/refrigerators/{{ $refrigerator->id}}/foods/fastcreate" method="post">

                    @csrf
                
                    {{-- <div class="card-header">Enter food</div>
                        <div class="card-body">
                            <ul class="list-group">
                                
                                <label for="name[1]">
                                    <li class="list-group-item">
                                        <input type="radio" name="name[1]" id="name[1]" class="mr-2" value="apple">
                                        apple
                                        <input type="hidden" name="name[1]" value="apple">
                                    </li>
                                </label>

                                <label for="name[2]">
                                    <li class="list-group-item">
                                        <input type="radio" name="name[2]" id="name[2]" class="mr-2" value="banana">
                                        banana
                                        <input type="hidden" name="name[2]" value="banana">
                                    </li>
                                    
                                </label>
            
                            </ul>
                        </div>

            
                        

                    </div> --}}

                    <div class="card-body">
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[1]" id="apple" value="リンゴ" style="zoom: 220%;">
                            リンゴ
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[2]" id="banana" value="バナナ" style="zoom: 220%;">
                            バナナバナナ
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[3]" id="milk" value="牛乳" style="zoom: 220%;">
                            牛乳
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[4]" id="chicken" value="鶏肉" style="zoom: 220%;">
                            鶏肉
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[5]" id="cake" value="ケーキ" style="zoom: 220%;">
                            ケーキ
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[6]" id="cookie" value="クッキー" style="zoom: 220%;">
                            クッキー
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Food</button>
                    

                    
                </form>

                

            </div>
        </div>
    </div>
</div>
@endsection