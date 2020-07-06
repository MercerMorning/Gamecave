Добавлена {{ $game }} в ассортимент
<br>
Цены:
@foreach($sites as $site)
    <br>
    {{ $site->name }} продает за {{ $site->price }}
@endforeach
