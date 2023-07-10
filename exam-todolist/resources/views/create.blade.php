<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class=container-fluid>
    <h1>Create new post</h1>
    <div class="row">
        <div class="col-6">
            <form action="{{route('todos.store')}}" method="post">
             
            @csrf
              
               @if ($errors->any())
               <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    
                  
                  @endforeach
                </ul>

               </div>
               @endif
               <div class="mb-3">

                    <label for="title" class="form-label">Title</label>

                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Put article title">

                    @error('title')

                        <div class="alert alert-danger">{{ $message }}</div>

                    @enderror

                </div>
              
              
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>

                    <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Put article description">

                    @error('description')

                        <div class="alert alert-danger">{{ $message }}</div>

                    @enderror
                </div>
                
                <input type="submit" class="btn btn-sm btn-success" name="addBtn" value="Add">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html> 
