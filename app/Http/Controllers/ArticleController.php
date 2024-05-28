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
           // Validation des champs de la requête
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image_path' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured' => 'boolean',

        ]);
        // Initialisation de la variable pour le chemin de l'image
        $image = null;
        // Vérifier si un fichier image est uploadé
        if ($request->hasFile('image_path')) {
            // Stocker l'image dans le répertoire 'public/blog'
            $chemin_image = $request->file('image_path')->store('public/images');

            // Vérifier si le chemin de l'image est bien généré
            if (!$chemin_image) {
                return redirect()->back()->with('error', "Erreur lors du téléchargement de l'image.");
            }
            // Récupérer le nom du fichier de l'image
            
            $image = basename($chemin_image);
        }

        // Créer un nouvel article
        $article = new Article();
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->image_path = $image; // Nom du fichier de l'image
        $article->featured = $request->featured;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
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

            $article = Article::findOrFail($id);            
            return view('articles.edit', compact('article'));
        }
        
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, $id)
        {
            
                $request->validate([
                    'titre' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $article = Article::findOrFail($id);
                $article->titre = $request->titre;
                $article->description = $request->description;
                $article->featured = $request->has('featured');
        
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('public/images');
                    $article->image_path = $imagePath;
                }
        
                $article->save();
        
                return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
        }
        
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(Article $article)
        {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        }
    }