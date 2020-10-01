@extends('layouts.app')
@section('content')

    <h1>Ajouter une équipe</h1>
    @can('add-teams')
        <form action="/teams" method="post">
            @csrf
            <label for="">Nom</label>
            <input type="text">
            <label for="">Emblème</label>
            <input type="file">
            <button type="submit">Soumettre</button>
        </form>
    @endcan
@endsection
