
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AppelOfrre Page</title>
  </head>
  <body>
    @include('navbar.navbar')
    <div class="container d-flex justify-content-center">

            <div class="col-md-12 table-center">
                <table class="table table-bordered border-dark table-striped table-hover">
                    <thead class="table-middle">
                      <tr>
                        <!--<th scope="col">id</th>-->
                        <th scope="col">client_id</th>
                        <th scope="col">ref</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Date_Ouv</th>
                        <th scope="col">Typesoumission</th>
                        <th>action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($appeloffres as $appeloffre)
                      <tr>
                        <!--<th>{{$appeloffre->id}}</th>-->
                        <td>{{ \App\Models\Client::find($appeloffre->client_id)->nom }}</td>
                        <td>{{$appeloffre->ref}}</td>
                        <td>{{$appeloffre->objet}}</td>
                        <td>{{$appeloffre->date_ouv}}</td>
                        <td>{{$appeloffre->typesoumission}}</td>
                        <td class="d-flex flex-row justify-content-center align-items-centers">
                            <a href="{{route('appeloffres.edit' , $appeloffre->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit "></i>
                            </a>
                            <form id="{{ $appeloffre->id }}" action="{{ route("appeloffres.destroy" , $appeloffre->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Voulez vous supprimer la catégorie {{ $appeloffre->typesoumission }} ?'))
                                document.getElementById({{ $appeloffre->id }}).submit()
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
                  {{$appeloffres->render()}}
            </div>
        </div>
    <div class="d-flex justify-content-center p-2 ">
        <a href="{{route('appeloffres.create')}}" class="d-flex ">Create Appel Offre</a>

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
