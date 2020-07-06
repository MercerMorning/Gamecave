<div class="side-bar">
    <h4>Жанры</h4>
    <ul class="game-list">
        @foreach($categories as $category)
            <li><a href="{{ route('category.list', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
