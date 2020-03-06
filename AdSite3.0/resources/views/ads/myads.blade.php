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


                                <a  class="btn btn-sm btn-outline-success py-0 openEditModal"   data-edit="{{json_encode($colectieads->edit_data)}}">Edit</a>
                                <a href="{{route('ads.destroy',$colectieads->id)}}" class="btn btn-sm btn-outline-danger py-0 deleteAd"  data-id="{{$colectieads->id}}">Delete</a>


                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal hide fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create Advertisement</h4>
                </div>
                <div class="modal-body">
                    @include('ads.create')
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal hide fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Edit Advertisement</h4>
                </div>
                <div class="modal-body">
                @include('ads.edit')
                </div>
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>





@endsection




