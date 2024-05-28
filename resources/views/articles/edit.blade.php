<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">


        <main class="mt-4 container mb-4">
            <div class="row mt-5 ">


                            <div class="row mt-5 ">
                                <div class="col-lg-11">
                                    <h2>Modifier contact</h2>
                                </div>
                                <div class="col-lg-1">
                                    <a  href="/articles" class="btn btn-outline-primary">Retour</a>
                                </div>
                            </div>
                            @if ($errors->any())

                                <div class="alert alert-danger">

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>

                                </div>

                            @endif

                            <form  action="{{ url('articles/update', $article->id) }}" method="POST" class="max-w-lg mx-auto" >
                                @csrf



                                <div class="form-group mb-3">

                                    <label for="nom">Titre:</label>
                                    <input type="text" class="form-control" id="nom" placeholder="Entrer Nom" name="titre" value="{{ $article->titre }}">

                                </div>


                            
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $article->description }}</textarea>
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="image" name="{{ Storage::url('public/images/' . $article->image_path) }}" >
                                    </div>
                            
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="featured" name="featured" {{ $article->featured ? 'checked' : '' }}>
                                        <label class="form-check-label" for="featured">
                                            Featured
                                        </label>
                                    </div>



                                <button type="submit" class="btn btn-primary">Enregistrer</button>

                            </form>
                        </div>
                    </main>


                </div>
            </div>
        </div>
    </body>
</html>
