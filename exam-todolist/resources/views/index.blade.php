<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">
            <form action="{{route('todos.create')}}" method="get">

          <div class="col-12">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
</form>
           
            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              
              <tbody>
              @foreach($todos as $todo)
                <tr>
                  <th scope="row">{{$todo->id}}</th>
                  @if ($todo->status=="Complete")
                      <td style="text-decoration:line-through">{{$todo->title}}
                      <br>
                      <p style="font-size:10px">Create: {{$todo->created_at}} <br> Update: {{$todo->updated_at}}</p>
                      </td>
                      @else
                     <td>{{$todo->title}}
                     <p style="font-size:10px">Create: {{$todo->created_at}} <br> Update: {{$todo->updated_at}}</p>
                     </td>
                      @endif
                  <td>{{$todo->description}}</td>
                  <td>
                  <form action="{{ route('todos.status', ['item'=>$todo->id])}}" method ="post">
                  @csrf
                  @if($todo->status=="Todo")
                      <button type="submit" class="btn" style="color:brown;">{{$todo->status}}</button>
                      @elseif($todo->status=="InProgress")
                      <button type="submit" class="btn" style="color:blue;">{{$todo->status}}</button>
                      @else
                      <button type="submit" class="btn" style="color:green;">{{$todo->status}}</button>
                      @endif
                      </form>
                    </td>
                  <td>
                  <form action="{{route('todos.delete', ['item' => $todo->id])}}" method ="get">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <form action="{{route('todos.edit', ['item' => $todo->id])}}" method ="get">
                    <button type="submit" class="btn btn-success ms-1">Edit</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>