@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pechmelding aanmaken</h1>
        <form action="{{route('pechmelding-aanmaken')}}" method="POST">
            @csrf
            <input type="hidden" name="user-id" value="{{Auth::user()->id}}">

            <label for="">locatie</label>
            <select class="form-control" name="area-id" id="">
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->plaats}}</option>
                @endforeach
            </select>
            <br>
            <input class="btn btn-dark" type="submit" value="Verzend">
        </form>
    </div>
@endsection
