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
                        <div>

                            @foreach($advertisements as $advertisement)
                                @if(isset($advertisement->title))
                                    <p>Item name: {{$advertisement->item->name}}</p>
                                    <p>Price: {{$advertisement->item->price}}</p>
                                    <p>Bought from {{$advertisement->title}}</p>
                                @endif
                                    @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


