@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">食べ物を入力してください</div>

                <div class="card-body">
                    <form action="/refrigerators/{{ $refrigerator->id}}/foods" method="post">

                      @csrf

                      <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input name="name" type="name" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="输入食物名">

                        @if ($errors->any())
                          @foreach ($errors->all() as $error)
                            <small class="text-danger">食べ物を入力してください</small>
                          @endforeach
                        @endif
                      
                      </div>
                      <div class="form-group mt-2">
                        <label for="production_data">製造日</label>
                        <input name="production_data" type="date" class="form-control" id="exampleproduction_data" aria-describedby="production_dataHelp" >
                        @if ($errors->any())
                          @foreach ($errors->all() as $error)
                            <small class="text-danger">製造日を入力してください</small>
                          @endforeach
                        @endif

                      </div>

                      <div class="form-group mt-2">
                        <label for="shelf_life">賞味期限</label>
                        <input name="shelf_life" type="date" class="form-control" id="exampleshelf_life" aria-describedby="shelf_lifeHelp" >
              
                      </div>

                        @if ($errors->any())
                          @foreach ($errors->all() as $error)
                            <small class="text-danger">賞味期限を入力してください</small>
                          @endforeach
                        @endif

                      <button type="submit" class="btn btn-primary">Add food</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection