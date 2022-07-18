<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create Contact</title>
  </head>
  <body>
    @include('navbar.navbar')
      <div class="row">
        <div class="col-md-8 mx-auto my-4">
            @include('layouts.alert')
        </div>
    </div>

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-secondary border-bottom mb-3 p-2">
                                 Ajouter Un Congé
                            </h3>
                            <form action="{{ route("conges.store") }}" method="post">
                                @csrf
                            <div class="form-group">

                                <label for="">Date Début</label>
                                <input
                                    type="date" name="datedebut" id="date_debut"
                                    class="form-control"
                                    placeholder=""
                                ><br>
                                <label for="">Date Fin</label>
                                <input
                                    type="date" name="datefin" id="date_fin"
                                    class="form-control"
                                    placeholder=""
                                ><br>
                                <label for="">Qauntité de jours</label>
                                <input
                                    type="text" name="quantite_jour" id="quantite_jour"
                                    class="form-control"
                                    placeholder=""
                                ><br>
                                <label for="">Motif de Congé</label>
                                <select name="motifconge" id="motifconge" class="form-control" aria-placeholder="motifconge">
                                    <option value="examen" >examen</option>
                                    <option value="paternité"  >paternité</option>
                                    <option value="maladie"  >maladie</option>
                                </select><br>
                                <label for="">is Valid</label>
                                <input
                                    type="number" name="is_valide" id="is_valid"
                                    class="form-control"
                                    placeholder="is_valid"
                                ><br>
                                <label for="">Commenter</label>
                                <input
                                    type="text" name="commenter" id="commenter"
                                    class="form-control"
                                    placeholder=""
                                ><br>

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
