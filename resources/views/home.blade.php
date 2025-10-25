@extends('layouts.app')

@section('content')
<div style="text-align: center; padding: 3rem 1rem;">
    <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Welcome to {{ config('app.name') }}</h1>
    
    <div style="max-width: 65ch; margin: 2rem auto;">
        <h2 style="font-size: 1.5rem; margin-bottom: 1.5rem;">Recent Articles</h2>
        
        @foreach(App\Models\Article::published()->take(3)->get() as $article)
            <div style="text-align: left; margin-bottom: 1.5rem; padding: 1rem; background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="margin: 0 0 0.5rem 0;">
                    <a href="{{ route('articles.show', $article) }}" style="color: #2563eb; text-decoration: none;">
                        {{ $article->title }}
                    </a>
                </h3>
                <div style="color: #6b7280; font-size: 0.875rem;">
                    {{ $article->published_at->diffForHumans() }}
                </div>
            </div>
        @endforeach

        <a href="{{ route('articles.index') }}" style="display: inline-block; margin-top: 1rem; padding: 0.5rem 1rem; background: #2563eb; color: white; text-decoration: none; border-radius: 6px;">
            View All Articles
        </a>
    </div>
</div>
@endsection
