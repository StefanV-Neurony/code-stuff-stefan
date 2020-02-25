@extends(layouts.app)

@section('content')

<div>
    @foreach($ads as $colectie)
        {{$colectie->items->name}}
        @endforeach
</div>
