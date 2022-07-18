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

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-secondary border-bottom mb-3 p-2">
                                 Ajouter Un task
                            </h3>
                            <form action="{{ route("tasks.store") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">client_id</label>
                                <select  name="client_id" id="client_id" class="form-control ppp">
                                    <option value="0" disabled selected>select Client</option>
                                    @foreach ($clients as  $client)
                                    <option value="{{ $client->id }}" >{{  $client->nom }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">projet ref</label>
                                <select name="projet_id" id="name_project" class="form-control">
                                </select><br>
                                <label for="">datedebut</label>
                                <input
                                    type="date" name="datedebut" id="datedebut"
                                    class="form-control"
                                    placeholder="datedebut"
                                ><br>
                                <label for="">datefin</label>
                                <input
                                    type="date" name="datefin" id="datefin"
                                    class="form-control"
                                    placeholder="datefin"
                                ><br>
                                <label for="">nombre_heure</label>
                                <input
                                    type="number" name="nombre_heure" id="nombre_heure"
                                    class="form-control"
                                    placeholder="nombre_heure"
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script>
    $(docment).ready(function(){
       $(document).on('change' , '.porjet_id' , function(){
        var projet_id=$(this).val();

       })
    });
   </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
  <script>
    $(document).ready(function() {
            $('#client_id').on('change', function() {
                 var id = $(this).val();
                if(id) {

                     $.ajax({
                        url: `http://localhost:8000/getproject/${id}`,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            //console.log(data);
                          if(data){
                            $('#name_project').empty();
                            $('#name_project').append('<option value="">-- Select MyProjet --</option>');
                            $.each(data, function(key, value){
                             for (let index = 0; index < value.projects.length; index++) {
                                const element = value.projects[index];
                                $('select[name="projet_id"]').append('<option value="'+ element.id +'">' + element.ref +'</option>');
                                console.log(element.id);

                             }
                        });
                      }else{
                        $('#name_project').empty();
                      }
                      }
                    });
                }else{
                  $('#name_project').empty();
                }
            });
    });
  </script>
</html>
