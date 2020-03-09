@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{--            Looping through all available ads in order to display them in the main page(only ads which have the valid property as 1 and displaying their creator--}}
                @foreach($ads as $colectieads)
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                             src="https://cdn.pixabay.com/photo/2018/01/05/00/20/test-image-3061864_960_720.png"
                             alt="Card image cap">
                        <div class="card-body">
                            <h1 class="card-text">{{$colectieads->title}}</h1>
                            @if(isset($currentuser->name)&&($colectieads->user->name==$currentuser->name))
                                <h2 class="card-text">Posted by: You</h2>
                            @else <h2 class="card-text">Posted by: {{$colectieads->user->name}}</h2>
                            @endif
                            <h3 class="card-text">Price: {{$colectieads->items->price}}</h3>
                            <p class="card-text">Contains: {{$colectieads->items->name}}</p>
                            <p class="card-text">Description: {{$colectieads->body}}</p>
                            @auth
                                @if($colectieads->user->name!=$currentuser->name)
                                    <button class="press press-green press-pill press-ghost purchaseAd"
                                            data-user="{{json_encode($currentuser)}}"
                                            data-edit="{{json_encode($colectieads->edit_data)}}">Purchase item
                                    </button>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
