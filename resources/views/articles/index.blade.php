<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="font-size: 2rem; margin-bottom: 2rem;">Articles</h1>

    <!-- Year/Month Filter -->
    <div class="filter-section" style="background: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <form action="{{ route('articles.index') }}" method="GET" style="display: flex; gap: 1rem; align-items: center;">
            <div>
                <label for="year" style="font-size: 0.875rem; color: #4b5563; margin-right: 0.5rem;">Year:</label>
                <select name="year" id="year" style="padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px;">
                    <option value="">All Years</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="month" style="font-size: 0.875rem; color: #4b5563; margin-right: 0.5rem;">Month:</label>
                <select name="month" id="month" style="padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 4px;">
                    <option value="">All Months</option>
                    @foreach($months as $num => $name)
                        <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" style="background: #2563eb; color: white; padding: 0.5rem 1rem; border: none; border-radius: 4px; cursor: pointer;">
                Filter
            </button>

            @if(request('year') || request('month'))
                <a href="{{ route('articles.index') }}" style="color: #6b7280; text-decoration: none; font-size: 0.875rem;">
                    Clear Filters
                </a>
            @endif
        </form>
    </div>

    @forelse($articles as $year => $yearArticles)
        <div class="year-section" style="margin-bottom: 3rem;">
            <h2 style="font-size: 1.5rem; color: #4b5563; border-bottom: 2px solid #e5e7eb; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">
                {{ $year }}
            </h2>

            <div class="articles">
                @foreach($yearArticles as $article)
                    <article class="article-card" style="background: white; padding: 1.5rem; margin-bottom: 1.5rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                        <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem;">
                            <a href="{{ route('articles.show', $article) }}" style="color: #2563eb; text-decoration: none;">
                                {{ $article->title }}
                            </a>
                        </h3>
                        
                        <div style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">
                            {{ $article->published_at->format('F j, Y') }}
                        </div>

                        <div style="color: #374151; margin-bottom: 1rem;">
                            {{ Str::limit($article->body, 150) }}
                        </div>

                        <a href="{{ route('articles.show', $article) }}" style="color: #2563eb; text-decoration: none; font-size: 0.875rem;">
                            Read more →
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    @empty
        <p>No articles found for the selected filters.</p>
    @endforelse
</div>
@endsection