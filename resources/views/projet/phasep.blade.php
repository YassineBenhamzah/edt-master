<div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Phase Projet  {{$projet->ref}}</h5><br>
        <h4 class="modal-title" id="exampleModalLabel">Phase Projet  {{$projet->Objet}}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-md-12 ">
                <table class="table table-bordered border-dark table-striped table-hover">
                    <thead class="table-center"><br>
                        <tr >

                          <!--<th class="col">Projet Ref</th>-->
                          <th class="col">Name</th>
                          <th class="col">Nombre Heures</th>
                          <th class="col"> Start Date</th>
                          <th class="col">Closing Date</th>
                          <th class="col">Exp Closing date</th>
                        </tr>
                      </thead>
                      <tbody id="tableData">
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->

        </div>
    </div>
    </div>
</div>
