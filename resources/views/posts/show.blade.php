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
                <strong>{{ $comment->created_at->diffForHumans() }}</strong>
                &nbsp by {{$comment->user->name}}: 
                {{ $comment->body }}
              </li>
            @endforeach
            </ul>
          </div>

          {{-- Add a comment --}}
          <hr>
          <div class="card">
              <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                  {{ csrf_field() }}

                
                <div class="form-group">
                  <textarea class="form-control" id="body" name="body" placeholder="Your comment here" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
              </form>
              </div>
          </div>

          @include('layouts.errors')

@endsection