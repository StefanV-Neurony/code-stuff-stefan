@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Items</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--                        Looping through all bought items and displaying their name and price--}}
                        @foreach($youritems as $colectieitems)
                            <div class="w3-panel w3-pale-green">
                                Item name: {{$colectieitems->items->name}} <br>
                                Price: {{$colectieitems->items->price}}<br>
                                Bought from: {{$colectieitems->title}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


