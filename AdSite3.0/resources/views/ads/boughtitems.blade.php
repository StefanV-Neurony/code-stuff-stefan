
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Bought Items</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach($youritems as $colectieitems)

                                <div class="w3-panel w3-pale-green">

                                  Nume Item: {{$colectieitems->items->name}} <br>
                                    Pret: {{$colectieitems->items->price}}








                                </div>

                            @endforeach






                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


