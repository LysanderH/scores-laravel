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
            {{--            @dd($stats)--}}
            @if(isset($stats))
                <?php
                $i = 0;
                ?>
                @foreach($stats as $stat)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="{{$stat->team->file_name}}" alt="" width="50" height="50"></td>
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
            @if(isset($matches))
                @foreach($matches as $match)
                    <tr>
                        <td>{{\Carbon\Carbon::createFromDate($match->played_at)->format('d/m/Y')}}</td>
                        <td>{{$match->home_team_name}}</td>
                        <td>{{$match->home_team_goals}}</td>
                        <td>{{$match->away_team_goals}}</td>
                        <td>{{$match->away_team_name}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Pas de match joué jusqu'à présent</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{--        Si pas de match trouvés--}}
    </section>
    <section class="teams">
        <h2>Teams</h2>
        <ul class="teams__list">
            @if(isset($teams))
                @foreach($teams as $team)
                    <li class="teams__item">
                        <img src="{{asset($team->file_name)}}" alt="" width="50" height="50">
                        {{--                    <img src="{{$team->file_name}}" alt="" width="50" height="50">--}}
                        <span>{{$team->name}}</span>
                    </li>
                @endforeach
            @else
                <li>Pas d'équipes pour le moment</li>
            @endif
        </ul>
    </section>
    {{--    @dd(\Illuminate\Support\Facades\Auth::user()->isAdministrator())--}}
    {{--    @auth()--}}
    {{--        @if(Auth::user()->isAdministrator())--}}
    {{-- --}}
    {{--        @endif--}}
    {{--    @endauth--}}
    @canany(['add-match', 'add-team'])
        <nav>
            <h2>Administration des matches et des équipes</h2>
            <ul>
                @can('add-team')
                    <li><a href="{{route('teams.create')}}">Add team</a></li>
                @endcan
                @can('add-match')
                    <li><a href="{{route('matches.create')}}">Add match</a></li>
                @endcan
            </ul>
        </nav>

    @endcanany
@endsection
