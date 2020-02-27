
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
                             <button onclick="document.getElementById('createmodal').style.display='block'" class="w3-button w3-green w3-xl">Create Ad</button>
</div>


                    </div>
                </div>
            </div>
        </div>


    <div id="createmodal" class="w3-modal w3-animate-zoom">
        <div class="w3-modal-content">
            <div class="w3-container">

                <span onclick="document.getElementById('createmodal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p> @include('ads.create')</p>
            </div>
        </div>
    </div>





@endsection


