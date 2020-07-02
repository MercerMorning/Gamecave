@include('includes.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <a href="{{route('admin.game.create')}}">добавить</a>
                <div class="panel-heading">Игры</div>
                <table class="table table-bordered">
                    @foreach($games as $game)
                        <tr>
                            <td>{{$game->id}}</td>
                            <td>{{$game->name}}</td>
                            <td>{{$game->price}}</td>
                            <td>
                                <a href="{{route('admin.game.edit', ['id' => $game->id])}}">изменить</a>
                                <a href="{{route('admin.game.delete', ['id' => $game->id])}}">удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <a href="{{route('admin.category.create')}}">добавить</a>
                <div class="panel-heading">Категории</div>
                <table class="table table-bordered">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('admin.category.edit', ['id' => $category->id])}}">изменить</a>
                                <a href="{{route('admin.category.delete', ['id' => $category->id])}}">удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')

