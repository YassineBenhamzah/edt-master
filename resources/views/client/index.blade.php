
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Client Page</title>
  </head>
  <body>
    @include('navbar.navbar')
      <div class="col-md-8 mx-auto my-4">
        @include('layouts.alert')
    </div>
    <div class="container d-flex justify-content-center">

            <div class="col-md-8 table-center">
                <table class="table table-bordered border-dark table-striped table-hover">
                    <thead class="table-middle">
                      <tr>
                        <!--<th scope="col">id</th>-->
                        <th scope="col">Nom</th>
                        <th scope="col">abréviation</th>
                        <th scope="col">ville</th>
                        <th>action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                      <tr>
                        <!--<th>{{$client->id}}</th>-->
                        <td>{{$client->nom}}</td>
                        <td>{{$client->abreviation}}</td>
                        <td>{{$client->ville}}</td>
                        <td class="d-flex flex-row justify-content-center align-items-centers">
                            <a href="{{route('clients.edit' , $client->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit "></i>
                            </a>
                            <form id="{{ $client->id }}" action="{{ route("clients.destroy" , $client->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Voulez vous supprimer la catégorie {{ $client->nom }} ?'))
                                document.getElementById({{ $client->id }}).submit()
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
                  {{$clients->render()}}
            </div>
        </div>
    <div class="d-flex justify-content-center p-2 ">
        <a href="{{route('clients.create')}}" class="d-flex ">Create Client</a>

     </div><br>


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
