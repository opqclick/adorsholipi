<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create New Article</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" style="display:inline;" data-confirm="Are you sure?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection