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
        <div class="row justify-content-left">
            <div class="col-md-10">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-secondary border-bottom mb-3 p-2">
                                 Ajouter Une Caution
                            </h3>
                            <form action="{{ route("cautions.store") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">Appel Offres</label>
                                <select name="appeloffres_id" id="appeloffres_id" class="form-control">
                                    @foreach ($appeloffres as $appeloffre)
                                    <option value="{{ $appeloffre->id }}"> {{ $appeloffre->ref }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">Projet</label>
                                <select name="projet_id" id="projet_id" class="form-control">
                                    @foreach ($projets as $projet)
                                    <option value="{{ $projet->id }}"> {{ $projet->ref }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">montant</label>
                                <input
                                    type="text" name="montant" id="montant"
                                    class="form-control"
                                    placeholder="montant"
                                ><br>
                                <p>Type Caution</p>
                                <select name="typecaution" id="typecaution" class="form-control" aria-placeholder="typecaution">
                                    <option value="definitive" >definitive</option>
                                    <option value="provisoire"  >provisoire</option>
                                </select><br>
                                <label for="">datedebit</label>
                                <input
                                    type="date" name="datedebit" id="datedebit"
                                    class="form-control"
                                    placeholder="datedebit"

                                ><br>
                                <label for="">bqdebit</label>
                                <input
                                    type="text" name="bqdebit" id="bqdebit"
                                    class="form-control"
                                    placeholder="bqdebit"
                                ><br>
                                <label for="">refchq</label>
                                <input
                                    type="text" name="refchq" id="refchq"
                                    class="form-control"
                                    placeholder="refchq"
                                ><br>
                                <label for="">dateconstitution</label>
                                <input
                                    type="date" name="dateconstitution" id="dateconstitution"
                                    class="form-control"
                                    placeholder="dateconstitution"
                                ><br>
                                <label for="">daterestitution</label>
                                <input
                                type="date" name="daterestitution" id="daterestitution"
                                class="form-control"
                                placeholder="daterestitution"
                                ><br>
                                <label for="">datecredit</label>
                                <input
                                type="date" name="datecredit" id="datecredit"
                                class="form-control"
                                placeholder="datecredit"

                                ><br>
                                <label for="">bqcredit</label>
                                <input
                                type="text" name="bqcredit" id="bqcredit"
                                class="form-control"
                                placeholder="bqcredit"
                                ><br>

                                <p>Moyen Crédit</p>
                                <select name="moycredit" id="moycredit" class="form-control" aria-placeholder="moycredit">
                                    <option value="cheque" >Chéque</option>
                                    <option value="virement"  >Virement</option>
                                </select><br>
                                <label for="">datedebit</label>
                                <input
                                type="text" name="refcredit" id="refcredit"
                                class="form-control"
                                placeholder="refcredit"
                                ><br>
                                <p>etat</p>
                                <select name="etat" id="etat" class="form-control" aria-placeholder="moycredit">
                                    <option value="constituee" >constituee</option>
                                    <option value="A restituer"  >A restituer</option>
                                    <option value="restituee"  >restituée</option>
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
