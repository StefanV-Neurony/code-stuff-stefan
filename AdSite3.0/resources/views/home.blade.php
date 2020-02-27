@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Currently available ads</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        @foreach($ads as $colectieads)
                            <div class="w3-panel w3-pale-green"> Titlu ad:{{$colectieads->title}} <br>
                                Item: {{$colectieads->items->name}}<br>
                                Price {{$colectieads->items->price}}<br>
                                @auth<button class="w3-circle w3-tiny">+</button>@endauth</div>


                        @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
