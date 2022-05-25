@extends('layouts.app')

@section('content')
<div class="container">

    <div class="nav-menu">
        <a class="btn btn-danger" href="{{route('pechmelding-form')}}">pechmelding</a>
    </div>
    
    @foreach ($abbonementen as $abbonement)
        @if ($abbonement->user_id != Auth::user()->id)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Stap 2</div>
                        <div class="card-body">
                            <h1>Abbonement</h1>
                            <p>kies uw abbonement</p>

                            <form action="{{route('createAbbonment')}}" method="POST">
                                @csrf
                                <select class="form-control" name="abbonement-keuze" id="">
                                    @foreach ($abbonementTypes as $type)
                                        <option value="{{$type->id}}">{{$type->abbonement_naam}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input class="btn btn-dark" type="submit" value="Kies">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else 
        
        @endif
    @endforeach


@endsection
