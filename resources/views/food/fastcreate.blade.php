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
                            <input class="ip" type="radio" name="food[1]" id="apple" value="apple" style="zoom: 220%;">
                            apple
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[2]" id="banana" value="banana" style="zoom: 220%;">
                            banana
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[3]" id="milk" value="milk" style="zoom: 220%;">
                            milk
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[4]" id="chicken" value="chicken" style="zoom: 220%;">
                            chicken
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[5]" id="cake" value="cake" style="zoom: 220%;">
                            cake
                        </div>
                        <div style="font-size: 300%">
                            <input class="ip" type="radio" name="food[6]" id="cookie" value="cookie" style="zoom: 220%;">
                            cookie
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Food</button>
                    

                    
                </form>

                

            </div>
        </div>
    </div>
</div>
@endsection