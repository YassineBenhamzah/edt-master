
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('js/myjs.js')}}"></script>
    <title>Projet Page</title>
  </head>
  <body>
    @include('navbar.navbar')


    <div class="container d-flex justify-content-center">
         <div class="col-md-12 table-center">
            <form action="{{route('projets.index')}}" class="col-md-9" method="POST"  role="search">
                @csrf
                <label >Search Ref</label>
                <input type="text" class="form-control" name="search" id="search" aria-describedat="helpId" placeholder="search" >
                <label >Search Type Projet</label>
                <input type="text" class="form-control" name="searchTy" id="search" aria-describedat="helpId" placeholder="search" >
                <label >Search etattech</label>
                <input type="text" class="form-control" name="searchetattech" id="search" aria-describedat="helpId" placeholder="search" >
                <label >Search etatfin</label>
                <input type="text" class="form-control" name="searchetatfin" id="search" aria-describedat="helpId" placeholder="search" >
                <label >Search ttc </label>
                <input type="text" class="form-control" name="searchmontant_ttc" id="search" aria-describedat="helpId" placeholder="search" >
                <label >Search nom </label>
                <input type="text" class="form-control" name="searchnom" id="search" aria-describedat="helpId" placeholder="search" >
                <button class="btn btn-primary" type="submit">Search</button>
              </form><br>
                <table class="table table-bordered border-dark table-striped table-hover">

                    <thead class="table-middle">
                      <tr>
                        <!--<th scope="col">id</th>-->
                        <th scope="col">Nom Client</th>
                        <th scope="col">ref</th>
                        <th scope="col">objet</th>
                        <th scope="col">montant_ht</th>
                        <th scope="col">montant_ttc</th>
                        <th scope="col">type_projet</th>
                        <th scope="col">dateosc</th>
                        <th scope="col">delai_execution</th>
                        <th scope="col">etattech</th>
                        <th scope="col">etatfin</th>
                        <th>action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $projet)
                      <tr>
                        <!--<th>{{$projet->id}}</th>-->
                        <td>{{ \App\Models\Client::find($projet->client_id)->nom }}</td>
                        <td>{{$projet->ref}}</td>
                        <td>{{$projet->objet}}</td>
                        <td>{{$projet->montant_ht}}</td>
                        <td>{{$projet->montant_ttc}}</td>
                        <td>{{$projet->type_projet}}</td>
                        <td>{{$projet->dateosc}}</td>
                        <td>{{$projet->delai_execution}}</td>
                        <td>{{$projet->etattech}}</td>
                        <td>{{$projet->etatfin}}</td>
                        <td class="d-flex flex-row justify-content-center align-items-centers">
                            <a href="{{route('projets.edit' , $projet->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit "></i>
                            </a>
                            <form id="{{ $projet->id }}" action="{{ route("projets.destroy" , $projet->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Voulez vous supprimer la catégorie {{ $projet->nom }} ?'))
                                document.getElementById({{ $projet->id }}).submit()
                                 "
                                class="btn btn-danger" >
                                    <i class="fas fa-trash ">

                                    </i>

                                </button>

                                </form>
                                <br>
                                @php
                                    $base_url = url('/');
                                @endphp
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary"
                                 onclick="phase({{$projet->id }})"
                                 data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-regular fa-building-columns"></i>
                                    <a href="#" class="btn btn-primary mr-1">
                                    </a>
                                </button>


                                <!--onclick="phase( {{$projet->id}} ,'{{$base_url}}')"-->
                                <!-- Modal -->
                                  @include('projet.phasep')
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
     <div class="d-flex justify-content-center">
        <a href="{{route('projets.create')}}">Create project</a>
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
