@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Milkky</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>Hello!</strong>
                    <div class="mt-4" method="post">
                        <a href="/refrigerators/create" class="btn btn-dark">ADD</a>
                    </div>
                </div>

          
            </div>
        </div>
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Your Refrigerator</div>
    
                <div class="card-body">
                    @foreach ($refrigerators as $refrigerator)
                        <li　type="1">
                            <a href="/refrigerators/{{ $refrigerator->id}}" class="btn ">{{ $refrigerator->name }}</a>
                        </li>
                    @endforeach 
                </div> 
            </div>
        </div>

        
    </div>
</div>
@endsection
