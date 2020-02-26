
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Ads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-succaess" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @foreach($yourads as $colectieads)

                            <div class="w3-panel w3-pale-green"> Titlu ad:{{$colectieads->title}} <br>
                                Item: {{$colectieads->items->name}} <br>
                                Valid {{$colectieads->valid}}<br>
                                Price {{$colectieads->items->price}}
                                <br>

                                <div><button class="w3-button w3-teal">Edit</button>
                            <button class="w3-button w3-red ">Delete</button></div>
                               </div>


                        @endforeach
                            <a href="{{route('ads.create')}}">  <button class="w3-button w3-green w3-xl">Create Ad</button></a>
</div>


                    </div>
                </div>
            </div>
        </div>







@endsection


