@extends('layouts.blog')
@section('content')
<main id="main">
    <div class="container">
        <h1 class="title main__title">{{$post->title}}</h1>
        <div class="main__one-post-center">
            <p class="">{{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} • {{$date->format('H:i')}} • Featured • {{$post->comments->count()}} комментария(-ий)</p>
            <div class="main__one-post">
                <img src="{{url('storage/'.$post->main_image)}}" alt="blog post">
                <div class="main__post-category-with-like">
                    <p class="blog-post-category">Категория:{{mb_strtolower($post->category->title)}}</p>
                    <div class="main__post-like">
                        @auth()
                            <form action="{{route('post.like.store',$post->id)}}" method="POST">
                                @csrf
                                <span>{{$post->liked_users_count}}</span>
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(!empty(auth()->user()->likedPosts) && auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        @endauth
                        @guest()
                            <div>
                                <span>{{$post->liked_users_count}}</span>
                                <i class="far fa-heart"></i>
                            </div>
                        @endguest
                    </div>
                </div>
                <a href="{{route('post.show',$post->id)}}" class="main__post-link">
                    <h6 class="blog-post-title">{{$post->title}}</h6>
                </a>
            </div>
        </div>
        <div class="main__related-posts">
            <h2 class="main__related-posts-title">Похожие посты</h2>
            <div class="main__related-posts-content">
                @if($relatedPosts->count() > 0)
                    @foreach($relatedPosts as $relatedPost)
                        <div class="main__related-post">
                            <a href="{{route('post.show',$relatedPost->id)}}"><img src="{{url('storage/'.$relatedPost->main_image)}}" alt="related post" class=""></a>
                            <h5 class="main__related-post-title">{{$relatedPost->title}}</h5>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @if(!empty($post->comments))
        <div class="main__comments">
            @foreach($post->comments as $comment)
                <div class="main__comment-text">
                    <span class="main__comment-username">{{$comment->user->name}}
                    <span class="main__comment-date">{{$comment->dateAsCarbon->diffForHUmans()}}</span></span>
                    <div>
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        @auth()
        <div class="main__add-comment">
            <h2 class="main__add-comment-title">Отправить комментарий</h2>
            <div class="main__add-comment-form">
                <form action="{{route('post.comment.store',$post->id)}}" method="POST">
                    @csrf
                    <div class="main__add-comment-text">
                        <label for="comment" class="">Комментарий</label>
                        <textarea name="comment" rows="7" cols="50">{{old('comment')}}</textarea>
                    </div>
                    <div class="main__add-comment-btn">
                        <input type="submit" value="Отправить">
                    </div>
                </form>
            </div>
        </div>
        @endauth
    </div>
</main>
@endsection
