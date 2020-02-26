@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('ads.store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="title">Ad title:</label>
                    <input type="text" name = "title" id = "title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="body">Items:</label>
                    <input type="text" name = "items" id = "items" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Price:</label>
                    <input type="text" name = "price" id = "price" class="form-control" required>
                </div>

                <button type = "submit" class = "w3-green w3-button">Submit</button>

            </form>
            <a href="{{route('ads.myads')}}"><button class="w3-button w3-red w3-right">Back to your ads</button></a>
            <a href="{{route('home')}}"><button class="w3-button w3-red w3-right">Back to home</button></a>
        </div>
    </div>
    @endsection
