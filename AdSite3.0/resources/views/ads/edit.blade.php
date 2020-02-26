@extends('layouts.app')
@section('title','Edit Advertisement')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('ads.update')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="title">Ad Title:</label>
                    <input type="text" name = "title" id = "title" class="form-control" required value = "{{$advertisement->title}}">
                </div>
                <div class="form-group">
                    <label for="items">Items:</label>
                    <input type="text" name = "items" id = "items" class="form-control" required value = "{{$advertisement->items->name}}">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name = "price" id = "price" class="form-control" required value = "{{$advertisement->items->price}}">
                </div>

                <input type="hidden" name="id" value = "{{$advertisement->id}}">
                <button type = "submit" class = "btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    @endsection
