@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">冷蔵庫関連情報を入力してください</div>

                <div class="card-body">
                    <form action="/refrigerators" method="post">

                      @csrf

                      <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input name="name" type="name" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="冷蔵庫名を入力してください">

                        @if ($errors->any())
                          @foreach ($errors->all() as $error)
                            <small class="text-danger">冷蔵庫名を入力してください</small>
                          @endforeach
                        @endif
                      
                      </div>
                      <button type="submit" class="btn btn-primary">Create A Refrigerator</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
