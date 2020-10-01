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
    {{--    @dd(\Illuminate\Support\Facades\Auth::user()->isAdministrator())--}}
{{--    @auth()--}}
{{--        @if(Auth::user()->isAdministrator())--}}
{{-- --}}
{{--        @endif--}}
{{--    @endauth--}}
@endsection
