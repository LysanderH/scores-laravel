@extends('layouts.app')
@section('content')
    <h1>Ajouter une partie</h1>
    <form action="/images/store" method="post" enctype="multipart/form-data">
        @csrf
        <label for="image">Ajouter l'image</label>
        <input type="file" id="image" name="image">
        <button type="submit">Soumettre</button>
    </form>
    @if(isset($imageName))
        <div>
            <img src="{{ asset('images/' . $imageName) }}" alt="">
        </div>
    @endif
@endsection
