var csrf = $('meta[name="csrf-token"]').attr('content');
function phase (id ){
    $.ajax({
        headers: { 'XCSRF-TOKEN': csrf
        },
        type:"GET",
        url:`http://localhost:8000/api/phase/${id}`,
        success: function(result){
            for(var i=0; i<result.data.phasep.length; i++ ){
                var tr = document.createElement('tr');

                //var td = document.createElement('td');
                //var td_project_id = document.createElement('td');
                var td_name = document.createElement('td');
                var nb_total_bugees = document.createElement('td');
                var start_date = document.createElement('td');
                var closing_date = document.createElement('td');
                var expclosing_date = document.createElement('td');

                //var td = document.createElement('td');
                //alert( result.data.phasep[i].id);
                //td.innerHTML = result.data.phasep[i].id;
                //td_project_id.innerHTML = result.data.projet.ref;
                td_name.innerHTML = result.data.phasep[i].name;
                nb_total_bugees.innerHTML = result.data.phasep[i].nb_total_bugees;
                start_date.innerHTML = result.data.phasep[i].start_date;
                closing_date.innerHTML = result.data.phasep[i].closing_date;
                expclosing_date.innerHTML = result.data.phasep[i].expclosing_date;

                //tr.appendChild(td);
                //tr.appendChild(td_project_id);
                tr.appendChild(td_name);
                tr.appendChild(nb_total_bugees);
                tr.appendChild(start_date);
                tr.appendChild(closing_date);
                tr.appendChild(expclosing_date);


                document.getElementById('tableData').appendChild(tr);
            }

            /* alert(id);
            alert(`http://localhost:8000/api/phase/${id}`);
            alert(result.data.phasep); */

            /*document.getElementById('phaseid').innerHTML = result.data.phasep.id;
            document.getElementById('projet_id').innerHTML = result.data.phasep.projet_id;
            document.getElementById('namephase').innerHTML = result.data.phasep.name;
            document.getElementById('nb_total_bugeesp').innerHTML = result.data.phasep.nb_total_bugees;*/
        },
        error: function(err){}
    });
}
