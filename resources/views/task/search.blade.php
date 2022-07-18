
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>taks Page</title>
  </head>
  <body>
    @include('navbar.navbar')


    <div class="container d-flex justify-content-center">

            <div class="col-md-8 table-center">
                <table class="table table-bordered border-dark table-striped table-hover">
                    <form action="{{url('SearchTask')}}" role="search" method="POST" >
                        @csrf
                    <input type="text" name="searchref" class="form-control" id="term"  placeholder=""><br>
                    <Label>First date</Label>
                    <input type="date" name="startDate" class="form-control" id="dateFrom" placeholder="search" class="mt-3 m-1"><br>
                    <Label class='form'>Last date</Label>
                    <input type="date" name="endDate" id="dateTo" class="form-control" placeholder="search"><br>
                    <button type="submit" class="btn btn-primary justify-content-center">Search</button><br>
                    <thead class="table-middle">
                      <tr>
                        <!--<th scope="col">id</th>-->
                        <th scope="col">client name</th>
                        <th scope="col">projet Ref</th>
                        <th scope="col">Date Début</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">Nombre heure</th>
                        <th>action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @if (is_array($tasks) || is_object($tasks))
                            @foreach ($tasks as $task)
                            <tr>
                              <!--<th>{{$task->id}}</th>-->
                              <td>{{ \App\Models\Client::find($task->client_id)->nom }}</td>
                              <td>{{ \App\Models\projet::find($task->projet_id)->ref }}</td>
                              <td>{{date('d/m/Y', strtotime($task->datedebut)) }}</td>
                              <td>{{date('d/m/Y', strtotime($task->datefin)) }}</td>
                              <td>{{$task->nombre_heure}}</td>
                              <td class="d-flex flex-row justify-content-center align-items-centers">
                                  <a href="{{route('tasks.edit' , $task->id)}}" class="btn btn-warning mr-1">
                                      <i class="fas fa-edit "></i>
                                  </a>
                                  <form id="{{ $task->id }}" action="{{ route("tasks.destroy" , $task->id) }}" method="post">
                                      @csrf
                                      {{-- @method("DELETE") --}}
                                      <button
                                      onclick="
                                      event.preventDefault();
                                      if(confirm('Voulez vous supprimer le task {{ $task->nom }} ?'))
                                      document.getElementById({{ $task->datedebut }}).submit()
                                       "
                                      class="btn btn-danger" >
                                          <i class="fas fa-trash ">

                                          </i>

                                      </button>
                                      </form>
                              </td>
                            </tr>
                            @endforeach
                            @endif


                    </tbody>
                  </table>

            </div>
        </div>
     <div class="d-flex justify-content-center">
        <a href="{{route('tasks.create')}}">Create Task</a>
     </div>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ADD Task
      </button>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h3 class="text-secondary border-bottom mb-3 p-2">
                Ajouter Un task
           </h3>
           <form action="{{ route("tasks.store") }}" method="post">
               @csrf
           <div class="form-group">
               <label for="">projet_id</label>
               <select name="projet_id" id="projet_id" class="form-control">
 {{--                   @foreach ($projets as $projet)
                   <option value="{{ $projet->id }}"> {{ $projet->objet }}</option>
                   @endforeach --}}
               </select><br>
               <label for="">client_id</label>
               <select name="client_id" id="client_id" class="form-control">
{{--                    @foreach ($clients as $client)
                   <option value="{{ $client->id }}"> {{ $client->nom }}</option>
                   @endforeach --}}
               </select><br>
               <label for="">datedebut</label>
               <input
                   type="date" name="datedebut" id="datedebut"
                   class="form-control"
                   placeholder="datedebut"
               ><br>
               <label for="">datefin</label>
               <input
                   type="date" name="datefin" id="datefin"
                   class="form-control"
                   placeholder="datefin"
               ><br>
               <label for="">nombre_heure</label>
               <input
                   type="time" name="nombre_heure" id="nombre_heure"
                   class="form-control"
                   placeholder="nombre_heure"
               ><br>

               <button class="btn btn-primary">
                   Valider
               </button>
           </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
