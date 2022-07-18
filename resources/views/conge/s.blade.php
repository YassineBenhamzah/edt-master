
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
        img, svg{
            width: 26px
        }
       </style>
    <title>Congé Page</title>
  </head>
  <body>
    @include('navbar.navbar')


    <div class="container d-flex justify-content-center">
            <div class="col-md-8 table-center">
                <table class="table table-bordered border-dark table-striped table-hover">
                    @if (Auth::check())
                    @if (auth()->user()->role_id )
                    <form action="{{route('SearchUser')}}" role="search" method="POST" >
                        @csrf
                    <input type="text" name="term" class="form-control" id="term"  placeholder=""><br>
                    <Label>First date</Label>
                    <input type="date" name="startDate" class="form-control" id="dateFrom" placeholder="search" class="mt-3 m-1"><br>
                    <Label class='form'>Last date</Label>
                    <input type="date" name="endDate" id="dateTo" class="form-control" placeholder="search"><br>
                    <button type="submit" class="btn btn-primary justify-content-center">Search</button><br>
                    @endif
                    @endif
                    </form>
                    <thead class="table-middle"><br>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Full name user</th>
                        <th scope="col">Date Début</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">Quantité de jours</th>

                        <th scope="col">Commenter</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody id="tableData">
                        @foreach ($demcongs as $demcong)
                      <tr>
                        <th>{{$demcong->id}}</th>
                        <th>{{ \App\Models\User::find($demcong->user_id)->name }}</th>
                        <td>{{date('d/m/Y', strtotime($demcong->datedebut)) }}</td>
                        <td>{{date('d/m/Y', strtotime($demcong->datefin)) }}</td>
                        <td>{{$demcong->quantite_jour}}</td>

                        <td>{{$demcong->commenter}}</td>
                        <td class="d-flex flex-row justify-content-center align-items-centers">
                            <a href="{{route('conges.edit' , $demcong->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit "></i>
                            </a>
                            <form id="{{ $demcong->id }}" action="{{ route("conges.destroy" , $demcong->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Voulez vous supprimer le Congé de {{ $demcong->datedebut }} ?'))
                                document.getElementById({{ $demcong->id }}).submit()
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
                  <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
     <div class="d-flex justify-content-center">
        <a href="{{route('conges.create')}}">Create contact</a><br>
     </div><br>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="extensions/filter-control/bootstrap-table-filter-control.js"></script>
  </body>
</html>
