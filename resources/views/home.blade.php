@extends('layouts.app')

@section('content')
<div style="text-align:center; padding:3rem 1rem;">
    <h1 style="font-size:2rem; margin-bottom:0.5rem;">Welcome to {{ config('app.name') }}</h1>
    <p style="color:#6b7280; margin-bottom:1rem;">Browse articles or create one if you're signed in.</p>
    <a href="{{ route('articles.index') }}" style="background:#2563eb;color:#fff;padding:.5rem 1rem;border-radius:6px;text-decoration:none;">Browse Articles</a>
</div>
@endsection
