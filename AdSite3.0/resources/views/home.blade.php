@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



                        @foreach($ads as $colectieads)
                         <br>   <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png" alt="Card image cap">
                                <div class="card-body">

                                    <h1 class="card-text">{{$colectieads->title}}</h1>
                                    <h2 class="card-text">Posted by: {{$colectieads->user->name}}</h2>
                                    <h3 class="card-text">Price: {{$colectieads->items->price}}</h3>
                                    <p class="card-text">Description: {{$colectieads->body}}</p>
                                   @auth <button class="press press-green press-pill press-ghost purchaseAd" data-edit="{{json_encode($colectieads->edit_data)}}">Purchase item</button>@endauth
                                </div>
                            </div>
                        @endforeach




                </div>
            </div>
        </div>

@endsection
