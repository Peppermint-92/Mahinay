<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
    <a class="navbar-brand" href="http://127.0.0.1:8000/movies">
      <img src="https://upload.wikimedia.org/wikipedia/commons/1/1e/RPC-JP_Logo.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
      Moviemaniac!
    </a>
        
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Movie Gallery CRUD Project</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('movies.create') }}"> Add Movie</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Movie Title</th>
                    <th>Movie Genre</th>
                    <th>Movie Director</th>
                    <th>Release Year</th>
                    <th width="280px">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->release }}</td>
                        <td>
                            <form action="{{ route('movies.destroy',$movie->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $movies->links() !!}
    </div>
</body>
</html>