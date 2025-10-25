<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::published();
        
        // Get available years and months for filter
        $years = Article::published()
            ->selectRaw('YEAR(published_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $months = collect(range(1, 12))->mapWithKeys(function($month) {
            return [$month => date('F', mktime(0, 0, 0, $month, 1))];
        });

        // Apply filters
        if ($request->year) {
            $query->whereYear('published_at', $request->year);
        }
        
        if ($request->month) {
            $query->whereMonth('published_at', $request->month);
        }

        $articles = $query->orderByDesc('published_at')
            ->get()
            ->groupBy(function($article) {
                return $article->published_at->format('Y');
            })
            ->sortKeysDesc();

        return view('articles.index', compact('articles', 'years', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
