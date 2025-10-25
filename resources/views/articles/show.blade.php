<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <article style="max-width: 65ch; margin: 0 auto;">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">{{ $article->title }}</h1>
        
        <div style="color: #6b7280; margin-bottom: 2rem;">
            Published {{ $article->published_at->format('F j, Y') }}
        </div>

        <div style="line-height: 1.6; color: #374151;">
            {!! nl2br(e($article->body)) !!}
        </div>

        <div style="margin-top: 2rem;">
            <a href="{{ route('articles.index') }}" style="color: #2563eb; text-decoration: none;">
                ← Back to Articles
            </a>
        </div>
    </article>
</div>
@endsection