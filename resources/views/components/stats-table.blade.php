<section class="container mt-5">
    <h2 class="display-5">Classement du championnat</h2>
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
                             class="rounded" height="50"></td>
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
</section>
