@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="display-5">Classement du championnat</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>&nbsp;</th>
                <th scope="col">Logo</th>
                <th scope="col"><a href="#">Team</a></th>
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
            {{--            @dd($stats)--}}
            @if(isset($stats))
                @foreach($stats as $stat)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td><img src="{{asset('storage/team-logo/resized/' . $stat->team->file_name)}}" alt=""
                                 class="rounded" width="50"
                                 height="50"></td>
                        <th scope="row">{{$stat->team->name}}</th>
                        <td>{{$stat->games}}</td>
                        <td>{{$stat->points}}</td>
                        <td>{{$stat->wins}}</td>
                        <td>{{$stat->losses}}</td>
                        <td>{{$stat->draws}}</td>
                        <td>{{$stat->goals_for}}</td>
                        <td>{{$stat->goals_against}}</td>
                        <td>{{$stat->goals_difference}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Pas d'équipes pour l'instant</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <section class="container mt-5">
        <h2 class="display-5">Matchs joués au </h2>
        <table class="table table-striped mx-auto ">
            <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Équipe visitée</th>
                <th>Goals de l’équipe visitée</th>
                <th>Goals de l’équipe visiteuse</th>
                <th>Équipe visiteuse</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($matches))
                @foreach($matches as $match)
                    <tr class="">
                        <td>{{\Carbon\Carbon::createFromDate($match->played_at)->format('d/m/Y')}}</td>
                        <td>{{$match->home_team_name}}</td>
                        <td>{{$match->home_team_goals}}</td>
                        <td>{{$match->away_team_goals}}</td>
                        <td>{{$match->away_team_name}}</td>
                    </tr>
                @endforeach
                <tr>
                    @else
                        <td>Pas de match joué jusqu'à présent</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{--        Si pas de match trouvés--}}
    </section>
    @yield('components.tables.teams-list')
    {{--    @dd(\Illuminate\Support\Facades\Auth::user()->isAdministrator())--}}
    {{--    @auth()--}}
    {{--        @if(Auth::user()->isAdministrator())--}}
    {{-- --}}
    {{--        @endif--}}
    {{--    @endauth--}}
    @canany(['add-match', 'add-team'])
        <nav class="container mt-5">
            <h2 class="display-5">Administration des matches et des équipes</h2>
            <ul class="list-group">
                @can('add-team')
                    <li class="nav-item"><a href="{{route('teams.create')}}" class="nav-link">Add team</a></li>
                @endcan
                @can('add-match')
                    <li class="nav-item"><a href="{{route('matches.create')}}" class="nav-link">Add match</a></li>
                @endcan
            </ul>
        </nav>

    @endcanany
@endsection
