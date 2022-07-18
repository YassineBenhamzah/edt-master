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
                                 modifie le contact {{ $contact->nom }}
                            </h3>
                            <form action="{{ route("contacts.update" , $contact->id) }}" method="post">
                                @csrf
                                @method("PUT")
                            <div class="form-group">
                                <label class="">Client id</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"> {{ $client->nom }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">Nom</label>
                                <input
                                    type="text" name="nom" id="nom"
                                    class="form-control"
                                    placeholder="Nom"
                                    value="{{$contact->nom}}"
                                ><br>
                                <label for="">prenom</label>
                                <input
                                    type="text" name="prenom" id="prenom"
                                    class="form-control"
                                    placeholder="prenom"
                                    value="{{$contact->prenom}}"
                                ><br>
                                <label for="">fonction</label>
                                <input
                                    type="text" name="fonction" id="fonction"
                                    class="form-control"
                                    placeholder="fonction"
                                    value="{{$contact->fonction}}"
                                ><br>
                                <label for="">telephone</label>
                                <input
                                    type="number" name="telephone" id="telephone"
                                    class="form-control"
                                    placeholder="telephone"
                                    value="{{$contact->telephone}}"
                                ><br>
                                <label for="">gsm</label>
                                <input
                                    type="text" name="gsm" id="gsm"
                                    class="form-control"
                                    placeholder="gsm"
                                    value="{{$contact->gsm}}"
                                ><br>
                                <label for="">mail</label>
                                <input
                                    type="text" name="mail" id="mail"
                                    class="form-control"
                                    placeholder="mail"
                                    value="{{$contact->mail}}"
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
