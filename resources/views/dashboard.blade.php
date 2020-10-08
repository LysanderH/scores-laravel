@extends('layouts.app')
@section('content')
    <h1 class="display-5 text-center container">⚽ Scores ⚽</h1>


    <x-package-stats-table :stats="$stats" />
    <x-package-matches-table :matches="$matches" />
    <x-package-team-list :teams="$teams" />
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
