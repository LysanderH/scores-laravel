@extends('layouts.app')
@section('content')
    {{Auth::user()->isAdministrator}}
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
                <option value="slug-one">Name Team one</option>
            </select>
            <label for="add-home-team">Équipe non listée?</label>
            <input type="text" id="add-home-team" name="add-home-team">
            <label for="home-team-goals">Goals de l’équipe à domicile</label>
            <input type="number" name="home-team-goals" id="home-team-goals">
        </fieldset>


        {{-- Away Team --}}
        <fieldset>
            <legend>Home team</legend>
            <label for="away-team">Équipe visiteuse</label>
            <select name="away-team" id="away-team">
                <option value="Name-team-one">Name Team one</option>
            </select>
            <label for="add-away-team">Équipe non listée?</label>
            <input type="text" id="add-away-team" name="add-away-team">
            <label for="away-team-goals">Goals de l’équipe visiteuse</label>
            <input type="number" name="away-team-goals" id="away-team-goals">
        </fieldset>

        <button type="submit">Ajouter ce match</button>
    </form>@endsection
