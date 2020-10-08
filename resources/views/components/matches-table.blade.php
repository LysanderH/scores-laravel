<section class="container mt-5" id="matches">
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
<div class="pagination justify-content-center">
    {{$matches->links()}}
</div>
    {{--        Si pas de match trouvés--}}
</section>
