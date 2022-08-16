
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
                <table class="table table-bordered border-dark table-striped table-hover" @auth @if (auth()->user()->role_id ) id="datatable" @else @endif @endauth>
                    @if (Auth::check())
                    @if (auth()->user()->role_id )
                    <form action="{{ url('SearchTask') }}" role="search" method="POST" >
                        @csrf
                    {{-- <input type="text"  name="searchref" class="form-control" id="term"  placeholder=""><br>
                    <Label>First date</Label>
                    <input type="date" name="startDate" class="form-control" id="dateFrom" placeholder="search" class="mt-3 m-1"><br>
                    <Label class='form'>Last date</Label>
                    <input type="date" name="endDate" id="dateTo" class="form-control" placeholder="search"><br>
                    <button type="submit" class="btn btn-primary justify-content-center">Search</button><br> --}}
                     <select name="" id="table-filter" data-column="0" class="form-control filter-select" >
                        <option value="">Select Name</option>
                        @foreach ($tasks as $task)
                          <option value="{{\App\Models\Client::find($task->client_id)->nom}}">{{ \App\Models\Client::find($task->client_id)->nom }}</option>
                        @endforeach
                        <option value=""></option>
                    </select><br>
                    <select name="" id="table-filter-ref" data-column="0" class="form-control filter-select" >
                        <option value="">Select Ref</option>
                        @foreach ($tasks as $task)
                          <option value="{{ \App\Models\projet::find($task->projet_id)->ref }}">{{ \App\Models\projet::find($task->projet_id)->ref }}</option>
                        @endforeach
                        <option value=""></option>
                    </select><br>
                    @endif
                    @endif
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
                    </tbody>

                  </table>

            </div>
        </div>
     <div class="d-flex justify-content-center">
        <a href="{{route('tasks.create')}}">Create Task</a>
     </div><br>

     <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
     </div>


    </div>
  </div>
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"> </script>
    <script>
       var table11 =$('#datatable').DataTable({
        dom: 'Bftrip',
        "bFilter": true,
        "bInfo": false,
        "paging": false,
        /*  language: {
            paginate: {
            previous: "<i class='fas fa-angle-left'>",
            next: "<i class='fas fa-angle-right'>"
            }
        }, */
        buttons: []

    });
    $('#table-filter').on('change', function(){
         table11.columns(0).search(this.value).draw();
     });
     $('#table-filter-ref').on('change', function(){
         table11.columns(1).search(this.value).draw();
     });

    </script>
  </body>
</html>
