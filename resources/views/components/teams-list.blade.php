<section class="container mt-5">
    <h2 class="display-5">Teams</h2>
    <ul class="list-group">
        @if(isset($teams))
            @foreach($teams as $team)
                <li class="list-group-item list-group-item-action">
                    <img src="{{asset('storage/team-logo/resized/' . $team->file_name)}}" class="rounded mr-1" alt="" height="50">
                    {{--                    <img src="{{$team->file_name}}" alt="" width="50" height="50">--}}
                    <span>{{$team->name}}</span>
                </li>
            @endforeach
        @else
            <li>Pas d'équipes pour le moment</li>
        @endif
    </ul>
</section>
