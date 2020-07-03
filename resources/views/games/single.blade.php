@include('includes.header')
<!-- Header Ends Here -->
<!-- Games Page Starts here -->
<div class="games">
    <div class="container">
        <div class="page-path">
            <ul class="path-list">
                <li><a href="{{ route('home')}}">Home</a></li>&nbsp;&nbsp;/&nbsp;&nbsp;
                <li><a href="#>Blog</a></li>&nbsp;&nbsp;/&nbsp;&nbsp;
                <li class="act">Details</li>
            </ul>
            <p><a href="index.html">Back to Home</a></p>
            <div class="clearfix"></div>
        </div>
        <h3 class="page-header">
            Recent Blogs
        </h3>
        <div class="blog-content">
            <div class="blog-post">
                <h3><a href="#">{{ $game->name }}</a></h3>
                <div class="post-details">
                    <p>Comments<span>({{ $comments->count() }})</span></p>
                </div>
                <img src="{{ URL::asset('storage/' . $game->image) }}" alt="">
                <p>{{ $game->description }}</p>
                <ul>
                    @foreach($prices as $price)
                        <li>
                            <a href="{{ route('game.link', ['site' => $price->name, 'game' => $price->game_name]) }}">
                                {{ $price->name }}
                            </a>
                            @if ($price->price == 0)
                                <p>нет в наличии</p>
                            @else
                                <p>{{ $price->price }}</p>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>

            <table border="1">
                <caption>Цены</caption>
                <tr>
                @foreach($prices as $price)
                    <tr>
                        <th>Магазин</th>
                        <th>Дата</th>
                        <th>Цена</th>
                    </tr>
                    @foreach($table as $value)
                        <td>
                            <tr>
                                <td>
                                    {{ $price->name }}
                                </td>
                                <td>
                            {{ $value->created_at }}
                                </td>
                                <td>
                            {{ $value->price }}
                                </td>
                            </tr>
                        </td>
                        @endforeach
                        @endforeach
                </tr>
            </table>

            <ul>
                <li>
                @foreach($comments as $comment)
                    <ul style="border: 2px solid black">
                        <li>
                            {{ $comment->name }}
                        </li>
                        <li>
                            {{ $comment->email }}
                        </li>
                        <li>
                            {{ $comment->message }}
                        </li>
                        <li>
                            {{ $comment->created_at }}
                        </li>
                    </ul>
                @endforeach
                </li>
            </ul>

            <form action="{{route('game.comment.add', ['id' => $game->id])}}" method="post" class="comment-box">
                {{ csrf_field() }}
                <h3 class="page-header">Comment Here </h3>
                <div class="text-cmt">
                    <input name="message" placeholder="Message">
                </div>
                <div class="text-cmt">
                    <input type="submit" />
                </div>
            </form>
            <ul>
            </ul>
        </div>
{{--        <div class="blog-sidebar">--}}
{{--            <h3 class="page-header">Catgeories</h3>--}}
{{--            <ul class="product-categories color"><li class="cat-item cat-item-42"><a href="#">Shooting</a> <span class="count">(14)</span></li>--}}
{{--                <li class="cat-item cat-item-60"><a href="#">Action</a> <span class="count">(2)</span></li>--}}
{{--                <li class="cat-item cat-item-63"><a href="#">Gloves</a> <span class="count">(2)</span></li>--}}
{{--                <li class="cat-item cat-item-54"><a href="#">Cars</a> <span class="count">(8)</span></li>--}}
{{--                <li class="cat-item cat-item-55"><a href="#">Racing</a> <span class="count">(11)</span></li>--}}
{{--                <li class="cat-item cat-item-64"><a href="#">Sports</a> <span class="count">(3)</span></li>--}}
{{--                <li class="cat-item cat-item-61"><a href="#">Style</a> <span class="count">(3)</span></li>--}}
{{--                <li class="cat-item cat-item-56"><a href="#">Bikes</a> <span class="count">(6)</span></li>--}}
{{--                <li class="cat-item cat-item-57"><a href="#">Zombies</a> <span class="count">(13)</span></li>--}}
{{--                <li class="cat-item cat-item-58"><a href="#">Wressling</a> <span class="count">(7)</span></li>--}}
{{--                <li class="cat-item cat-item-62"><a href="#">Watchers</a> <span class="count">(2)</span></li>--}}
{{--                <li class="cat-item cat-item-41"><a href="#">Women</a> <span class="count">(17)</span></li>--}}
{{--            </ul>--}}
{{--            <h3 class="page-header">Subscribe</h3>--}}
{{--            <div class="subscribe">--}}
{{--                <h4>Subscribe For News</h4>--}}
{{--                <input type="text" placeholder="Email.." required="" />--}}
{{--                <input type="submit" value="Subscribe" />--}}
{{--            </div>--}}
{{--            <h3 class="page-header">Papular Tags</h3>--}}
{{--            <ul class="tags_links">--}}
{{--                <li><a href="#">Design</a></li>--}}
{{--                <li><a href="#">Branding</a></li>--}}
{{--                <li><a href="#">Art</a></li>--}}
{{--                <li><a href="#">Developing</a></li>--}}
{{--                <li><a href="#">CSS</a></li>--}}
{{--                <li><a href="#">HTML</a></li>--}}
{{--                <li><a href="#">Wordpress</a></li>--}}
{{--                <li><a href="#">Photography</a></li>--}}
{{--            </ul>--}}

{{--        </div>--}}
        @include('includes.sidebar')
        <div class="clearfix"></div>

    </div>
</div>
<!-- What New Part Endss Here -->
<!-- Footer Starts Here -->
@include('includes.footer')
