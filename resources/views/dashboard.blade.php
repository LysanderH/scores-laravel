@extends('layouts.app')
@section('content')
    <h1>Classement du championnat</h1>
    <div>
        <table>
            <thead>
            <tr>
                <td></td>
                <th scope="col">Logo</th>
                <th scope="col">Team</th>
                <th scope="col">Games</th>
                <th scope="col">Points</th>
                <th scope="col">Wins</th>
                <th scope="col">Losses</th>
                <th scope="col">Draws</th>
                <th scope="col">GF</th>
                <th scope="col">GA</th>
                <th scope="col">GD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td><img src="" alt=""></td>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <section>
        <h2>Matchs joués au </h2>
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Équipe visitée</th>
                <th>Goals de l’équipe visitée</th>
                <th>Goals de l’équipe visiteuse</th>
                <th>Équipe visiteuse</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        {{--        Si pas de match trouvés--}}
        <p>Aucun match n’a été joué à ce jour</p>
    </section>
    @if(auth()->user()->is_admin)
        <form action="/match/create" method="post">
            @csrf
            <label for="date">Date du match</label>
            <input type="date" id="date" name="date">

            {{-- Home Team --}}
            <fieldset>
                <legend>Home team</legend>
                <label for="home-team">Équipe à domicile</label>
                <select name="home-team" id="home-team">
                    <option value="Name-team-one">Name Team one</option>
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
        </form>
    @endif
@endsection
