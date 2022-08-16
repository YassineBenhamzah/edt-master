
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
        img, svg{
            width: 26px
        }
       </style>
    <title>Congé Page</title>
  </head>
  <body>
    @include('navbar.navbar')

    <div class="container d-flex justify-content-center">

            <div class="col-md-8 table-center">
                <table class="table table-bordered border-dark table-striped table-hover " @auth @if (auth()->user()->role_id ) id="datatable" @else @endif @endauth>
                    @if (Auth::check())
                    @if (auth()->user()->role_id )
                    <select name="" id="table-filter" data-column="0" class="form-control filter-select" >
                        <option value="">Select Name</option>
                        @foreach ($demcongs as $demcong)
                          <option value="{{ \App\Models\User::find($demcong->user_id)->name }}">{{ \App\Models\User::find($demcong->user_id)->name }}</option>
                        @endforeach
                        <option value=""></option>
                    </select><br>
                    @endif
                    @endif
                    <thead class="table-middle"><br>
                      <tr>
                        <!--<th scope="col">id</th>-->
                        <th scope="col">Full name user</th>
                        <th scope="col">Date Début</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">Quantité de jours</th>
                        <th scope="col">Motif De Congée</th>

                        <th scope="col">Commenter</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody id="tableData">
                        @foreach ($demcongs as $demcong)
                      <tr>
                        <!--<th>{{$demcong->id}}</th>-->
                        <th>{{ \App\Models\User::find($demcong->user_id)->name }}</th>
                        <td>{{date('d/m/Y', strtotime($demcong->datedebut)) }}</td>
                        <td>{{date('d/m/Y', strtotime($demcong->datefin)) }}</td>
                        <td>{{$demcong->quantite_jour}}</td>
                        <td>{{$demcong->motifconge}}</td>

                        <td>{{$demcong->commenter}}</td>
                        <td class="d-flex flex-row justify-content-center align-items-centers">
                            <a href="{{route('conges.edit' , $demcong->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit "></i>
                            </a>
                            <form id="{{ $demcong->id }}" action="{{ route("conges.destroy" , $demcong->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Voulez vous supprimer le Congé de {{ $demcong->datedebut }} ?'))
                                document.getElementById({{ $demcong->id }}).submit()
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
                  <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
     <div class="d-flex justify-content-center">
        <a href="{{route('conges.create')}}">Create contact</a><br>
     </div><br>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"> </script>
    <script>
       var table11 =$('#datatable').DataTable({
        dom: 'Bftrip',
        "bFilter": true,
        "bInfo": false,
        language: {
            paginate: {
            previous: "<i class='fas fa-angle-left'>",
            next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: []

    });
    $('#table-filter').on('change', function(){
         table11.columns(0).search(this.value).draw();
     });
    /*  $('#table-filter-ref').on('change', function(){
         table11.search(this.value).draw();
     }); */
        /* $(document).ready(function(){
            var table = $('#datatable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax' : "{{ route('tasks.index') }}"
                'columns' :[
                    {'data' : 'nom'}
                ],
            });
            $('.filter-select').change(function){
            table.column( $(this).data('column'))
            .search( $(this).val())
            .draw();
        }
        }); */
    </script>
  </body>
</html>
