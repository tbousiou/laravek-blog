@extends('layouts.master')

@section('content')
          <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $post->title }}
            </h2>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">Chris</a></p>

            {{ $post->body}}
          </div><!-- /.blog-post -->

          <div class="comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
              <li class="list-group-item">
                <strong>{{ $comment->created_at->diffForHumans() }}</strong>&nbsp;
                {{ $comment->body }}
              </li>
            @endforeach
            </ul>
          </div>

@endsection