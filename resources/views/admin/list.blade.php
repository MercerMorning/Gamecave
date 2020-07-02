@include('includes.header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{route('game.create')}}">добавить</a>
                    <div class="panel-heading">Books</div>
                    <table class="table table-bordered">
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->id}}</td>
                                <td>{{$game->name}}</td>
                                <td>{{$game->price}}</td>
                                <td>
                                    <a href="{{route('game.edit', ['id' => $game->id])}}">edit</a>
                                    <a href="{{route('game.delete', ['id' => $game->id])}}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')

