@extends('layouts.app')
@section('content')
    <h1>Ajouter une partie</h1>
    <form action="/matches" method="post">
        @csrf
        <label for="date">Date du match</label>
        <input type="date" id="date" name="date">

        {{-- Home Team --}}
        <fieldset>
            <legend>Home team</legend>
            <label for="home-team">Équipe à domicile</label>
            <select name="home-team" id="home-team">
                @foreach($teams as $team)
                    <option value="{{$team->slug}}">{{$team->name}}</option>
                @endforeach
            </select>
            <label for="home-team-goals">Goals de l’équipe à domicile</label>
            <input type="number" name="home-team-goals" id="home-team-goals">
        </fieldset>


        {{-- Away Team --}}
        <fieldset>
            <legend>Away team</legend>
            <label for="away-team">Équipe visiteuse</label>
            <select name="away-team" id="away-team">
                @foreach($teams as $team)
                    <option value="{{$team->slug}}">{{$team->name}}</option>
                @endforeach
            </select>
            <label for="away-team-goals">Goals de l’équipe visiteuse</label>
            <input type="number" name="away-team-goals" id="away-team-goals">
        </fieldset>

        <button type="submit">Ajouter ce match</button>
    </form>@endsection
