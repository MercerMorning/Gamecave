@include('includes.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit game</div>
                <form enctype="multipart/form-data" action="{{route('game.save', ['id' => $game])}}" method="get">
                    {{ csrf_field() }}
                    {{ $game }}
                    <table class="table table-bordered">
                        <tr>
                            <td>name</td>
                            <td>
                                <input type="text" name="name">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>price</td>
                            <td>
                                <input type="text" name="price">
                                @if ($errors->has('price'))
                                    <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>category</td>
                            <td>
                                <input type="text" name="category">
                                @if ($errors->has('category'))
                                    <div class="alert alert-danger">{{$errors->first('category')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td>
                                <input type="text" name="descr">
                                @if ($errors->has('descr'))
                                    <div class="alert alert-danger">{{$errors->first('descr')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>image</td>
                            <td>
                                <input type="file" name="image">
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger">{{$errors->first('image')}}</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="создать">
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
