@extends('layouts.app')
@section('content')
    <h1 class="container display-4">Ajouter une partie</h1>
    @if(session('success'))
        <x-package-info-box/>
    @endif
    @if(session('error'))
        <p class="error">{{session('error')}}</p>
    @endif
    <form action="/matches" method="post" class="container needs-validation mx-auto">
        @csrf
        <div class="form-group">
            <label for="date">Date du match</label>
            <input type="date" id="date" name="played_at" class="form-control">
        </div>

        {{-- Home Team --}}
        <fieldset>
            <legend>Home team</legend>
            <div class="form-group">
                <label for="home-team">Équipe à domicile</label>
                <select name="home-team" id="home-team" class="custom-select">
                    @foreach($teams as $team)
                        <option value="{{$team->slug}}">{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="home-team-goals">Goals de l’équipe à domicile</label>
                <input type="number" name="home-team-goals" id="home-team-goals" class="form-control" min="0">
            </div>
        </fieldset>


        {{-- Away Team --}}
        <fieldset>
            <legend>Away team</legend>
            <div class="form-group">
                <label for="away-team">Équipe visiteuse</label>
                <select name="away-team" id="away-team" class="custom-select">
                    @foreach($teams as $team)
                        <option value="{{$team->slug}}">{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="away-team-goals">Goals de l’équipe visiteuse</label>
                <input type="number" name="away-team-goals" id="away-team-goals" class="form-control" min="0">
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Ajouter ce match</button>
    </form>
@endsection
