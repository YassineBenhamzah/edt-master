<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create phase</title>
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
                                 Ajouter Une phase
                            </h3>

                            <form action="{{ route("phases.store") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">projet_id</label>
                                <select name="projet_id" id="projet_id" class="form-control">
                                    @foreach ($projets as $projet)
                                    <option value="{{ $projet->id }}"> {{ $projet->objet }}</option>
                                    @endforeach
                                </select><br>

                                <label for="">Name</label>
                                <input
                                    type="text" name="name" id="name"
                                    class="form-control"
                                    placeholder="name"

                                ><br>

                                <label for="">Nombre heures</label>
                                <input
                                    type="text" name="nb_total_bugees" id="nb_total_bugees"
                                    class="form-control"
                                    placeholder="nb_total_bugees"
                                ><br>
                                <input
                                type="date" name="start_date" id="start_date"
                                class="form-control"
                                placeholder="start_date"
                            ><br>
                            <input
                                type="date" name="closing_date" id="closing_date"
                                class="form-control"
                                placeholder="closing_date"
                            ><br>
                            <input
                                type="date" name="expclosing_date" id="expclosing_date"
                                class="form-control"
                                placeholder="expclosing_date"
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
