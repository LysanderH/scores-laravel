@extends('layouts.app')
@section('content')
    <h1>Ajouter une équipe</h1>

    <form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Nom</label>
        <input type="text" name="name">
        @error('name')
{{--        @dd($errors)--}}
        <p>{{$message}}</p>
        @enderror
        <label for="">Emblème</label>
        <input type="file" name="file_name">
        @error('file_name')
        <p>{{$message}}</p>
        @enderror
        <button type="submit">Soumettre</button>
    </form>

@endsection
