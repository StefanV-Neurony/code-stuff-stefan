@extends('layouts.app')

@section('content')
    Prefixes for 1H Axes
  <div class="w3-centre">


      <li class="prefixList">

              @foreach($axemods as $axemod)

              <ul>
                  <li>{{$axemod['Name']}}</li>
            {!! html_entity_decode($axemod['str'])!!}<br>
            Required Level to roll: {{$axemod['Level']}}


        </ul>

        @endforeach

{{$axemods->links()}}
      </div>


    @endsection
