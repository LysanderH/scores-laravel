@extends('layouts.app')
@section('content')
    <h1 class="display-4 text-center m-5">Ajouter une équipe</h1>
    @if(session('success'))
        <x-package-info-box/>
    @endif
    <form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data"
          class="col-sm needs-validation mx-auto" style="width: 350px">
        @csrf
        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="name" class="form-control" placeholder="Manchester United">
            @error('name')
            <p class="alert-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-file">
                <label for="file" class="custom-file-label">Choisir un emblème</label>
                <input type="file" id="file" name="file_name" class="custom-file-input">
                @error('file_name')
                <p class="alert-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
    <x-package-team-list :teams="$teams"/>
@endsection
