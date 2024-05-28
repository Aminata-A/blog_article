
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
  h1{
    display: flex;
    align-items: center;
    justify-content: center;
    color: blue;
    margin-bottom: 2em;
    font-weight: bold;
  }
  .d-flex{
    justify-content: space-around;
  }
</style>
<body>
<h1>Mes articles</h1>
<!-- Dans n'importe quelle vue où vous souhaitez afficher le bouton -->
@foreach ($mon_blog as $article)

<a href="{{ route('articles.create') }}" class="btn btn-primary">Créer un nouvel article</a>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ Storage::url('public/images/' . $article->image_path) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$article->titre}}</h5>
    <p class="card-text">{{$article->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <a href="{{ route('articles.show', ['id' => $article->id]) }}" class="card-link">voir plus</a>
    <li class="list-group-item">{{$article->featured}}</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body d-flex">
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-danger">Modifer</a>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>


              
               
          @endforeach

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



