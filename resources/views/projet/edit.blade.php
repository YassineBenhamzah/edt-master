<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>edit Contact</title>
  </head>
  <body>
    @include('navbar.navbar')

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-secondary border-bottom mb-3 p-2">
                                 modifie le projet {{ $projet->nom }}
                            </h3>
                            <form action="{{ route("projets.update" , $projet->id) }}" method="post">
                                @csrf
                                @method("PUT")
                            <div class="form-group">
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"> {{ $client->nom }}</option>
                                    @endforeach
                                </select><br>
                                <input
                                    type="text" name="ref" id="ref"
                                    class="form-control"
                                    placeholder="objet"
                                    value="{{$projet->ref}}"
                                ><br>
                                <input
                                    type="text" name="objet" id="objet"
                                    class="form-control"
                                    placeholder="objet"
                                    value="{{$projet->objet}}"
                                ><br>
                                <input
                                    type="text" name="montant_ht" id="montant_ht"
                                    class="form-control"
                                    placeholder="montant_ht"
                                    value="{{$projet->montant_ht}}"
                                ><br>
                                <input
                                    type="text" name="montant_ttc" id="montant_ttc"
                                    class="form-control"
                                    placeholder="montant_ttc"
                                    value="{{$projet->montant_ttc}}"
                                ><br>
                                <input
                                    type="text" name="type_projet" id="type_projet"
                                    class="form-control"
                                    placeholder="type_projet"
                                    value="{{$projet->type_projet}}"
                                ><br>
                                <input
                                    type="date" name="dateosc" id="dateosc"
                                    class="form-control"
                                    placeholder="dateosc"
                                    value="{{$projet->dateosc}}"
                                ><br>
                                <input
                                    type="text" name="delai_execution" id="delai_execution"
                                    class="form-control"
                                    placeholder="delai_execution"
                                    value="{{$projet->delai_execution}}"
                                ><br>
                                <p>Etatech</p>
                                <select name="etattech" id="etattech" class="form-control" aria-placeholder="etattech">
                                    <option value="encourse" >En cours</option>
                                    <option value="cloture"  >Cloturé</option>
                                </select><br>
                                <p>etatfin</p>
                                <select name="etatfin" id="etatfin" class="form-control">
                                    <option value="encourse" >En cours</option>
                                    <option value="cloture"  >Cloturé</option>
                                </select><br>

                                <button class="btn btn-primary">
                                    Valider
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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
