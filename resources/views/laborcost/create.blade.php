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
                                 Ajouter Un laborcost
                            </h3>
                            <form action="{{ route("laborcosts.store") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">User_id</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">startingdate</label>
                                <input
                                    type="date" name="startingdate" id="startingdate"
                                    class="form-control"
                                    placeholder="startingdate"
                                ><br>
                                <label for="">finaldate</label>
                                <input
                                    type="date" name="finaldate" id="finaldate"
                                    class="form-control"
                                    placeholder="finaldate"
                                ><br>
                                <label for="">cost</label>
                                <input
                                    type="text" name="cost" id="cost"
                                    class="form-control"
                                    placeholder="cost"
                                ><br>
                                <label for="">isarchived</label>
                                <input
                                    type="number" name="isarchived" id="isarchived"
                                    class="form-control"
                                    placeholder="isarchived"
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
