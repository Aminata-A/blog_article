<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $mes_articles = Article::All();
        
        return view('articles.index', [
            'mon_blog' =>  $mes_articles
        ]);    }
        
        /**
        * Show the form for creating a new resource.
        */
    
        public function create(Request $request)
        {
            return view('articles.create'); // Assurez-vous que le nom de la vue est correct
        }
        
        
        /**
        * Store a newly created resource in storage.
        */
        public function store(Request $request)
        {
            $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $article = new Article;
            $article->titre = $request->titre;
            $article->description = $request->description;
            $article->featured = $request->has('featured');
            $article->created_at = now();
            
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $article->image_path = $imagePath;
            }
            
            $article->save();
            
            return redirect()->route('articles.index')->with('success', 'Article created successfully.');
        }
        
        /**
        * Display the specified resource.
        */
        public function show(string $id)
        {
            $article = Article::findOrFail($id);
            return view('articles.show', compact('article'));
        }
        
        
        /**
        * Show the form for editing the specified resource.
        */
        public function edit(string $id)
        {
            //
        }
        
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, string $id)
        {
            //
        }
        
        /**
        * Remove the specified resource from storage.
        */
        public function delete(Article $article)
        {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        }
    }
    