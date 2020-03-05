@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Ads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <a id="openCreateModal" class="btn btn-primary d-flex justify-content-center bg-success">Create Ad</a>

                        @foreach($yourads as $colectieads)

                            <div class="w3-panel w3-pale-green">

                                Titlu ad:{{$colectieads->title}} <br>
                                Descriere: {{$colectieads->body}}<br>
                                Item: {{$colectieads->items->name}} <br>
                                Valid {{$colectieads->valid}}<br>
                                Price {{$colectieads->items->price}}
                                <br>


                                <a  data-target="editModal" data-toggle="modal" data-title="{{$colectieads->title}}" class="btn btn-sm btn-outline-success py-0 openEditModal"  data-id="{{$colectieads->id}}">Edit</a>
                                <a href="{{route('ads.destroy',$colectieads->id)}}" class="btn btn-sm btn-outline-danger py-0 deleteAd"  data-id="{{$colectieads->id}}">Delete</a>

{{--                                <div class="modal fade editModal">@include('ads.edit',['ads'=>$yourads])--}}

{{--                                </div>--}}
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

                <div id="createModal" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="container">
                            <span id="closeCreateModal">&times;</span>
                            @include('ads.create')
                        </div>
                        </div>
                    </div>
                </div>




@endsection




