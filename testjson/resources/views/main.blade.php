@extends('layouts.app')

@section('content')
<style>
    #suffixList {
        display:none;
    }

    #prefixList{
        display:none;
    }
    #modList {
        display:none;
    }
    #corruptedList {
        display:none;
    }
</style>
    <div>

    <button id="showMods" class="w3-button w3-teal w3-round w3-right">Show all mods</button>
    <button id="showSuffixes" class="w3-button w3-teal w3-round w3-right">Show suffixes only</button>
    <button id="showPrefixes" class="w3-button w3-teal w3-round w3-right">Show prefixes only</button>
    <button id="showCorrupted" class="w3-button w3-teal w3-round w3-right">Show corrupted only</button>
</div>
<div class="maincontent">
    <div id="modList" class="content">

        @foreach($allmodlists as $allmodlist)

            @if(isset($allmodlist['name']))

                <ul>
                    <li>Name: {{$allmodlist['name']}}</li>
                    Type: {{$allmodlist['type']}} <br>
                    Minimum ilvl required: {{$allmodlist['required_level']}}<br>

                    Mod Type: {{$allmodlist['generation_type']}}<br>
                </ul>
            @endif




        @endforeach
        <div id="#modPagination"> {{$allmodlists->render()}}</div>

    </div>
    <div id="suffixList" class="content">

        @foreach($suffixchunks as $suffixchunk)

            @if(isset($suffixchunk['name']))

                <ul>
                    <li>Name: {{$suffixchunk['name']}}</li>
                    Type: {{$suffixchunk['type']}} <br>
                    Minimum ilvl required: {{$suffixchunk['required_level']}}<br>

                    Mod Type: {{$suffixchunk['generation_type']}}<br>
                </ul>
            @endif




        @endforeach
        {{$suffixchunks->render()}}
    </div>
    <div id="prefixList" class="content">

        @foreach($prefixchunks as $prefixchunk)

            @if(isset($prefixchunk['name']))

                <ul>
                    <li>Name: {{$prefixchunk['name']}}</li>
                    Type: {{$prefixchunk['type']}} <br>
                    Minimum ilvl required: {{$prefixchunk['required_level']}}<br>

                    Mod Type: {{$prefixchunk['generation_type']}}<br>
                </ul>
            @endif




        @endforeach
        {{$prefixchunks->render()}}
    </div>
    <div id="corruptedList" class="content">

        @foreach($corruptedchunks as $corruptedchunk)

            @if(isset($corruptedchunk['name']))

                <ul>
                    <li>Name: {{$corruptedchunk['name']}}</li>
                    Type: {{$corruptedchunk['type']}} <br>
                    Minimum ilvl required: {{$corruptedchunk['required_level']}}<br>

                    Mod Type: {{$corruptedchunk['generation_type']}}<br>
                </ul>
            @endif




        @endforeach
        {{$corruptedchunks->render()}}
    </div>
</div>
@endsection
