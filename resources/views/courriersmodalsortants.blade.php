<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

</head>
<body>
  @if(count($errors) > 0)
    <div class=" alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>    
        @endforeach
      </ul>
    </div>
    @endif
    @if (session('success'))
      <div class="alert alert-success">
          <p>{{ session('success') }}</p>
      </div> 
  @endif

  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-5">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Envoyer</button>
                </div>
                <div class="col">
                  <h2>La liste des courriers envoyés</h2>
                </div>
            </div>
        <!-- </div> -->
      </div>

      <!-- debut du tableau -->
      <table class="table table-striped table-bordered" id="datatable">
          <thead class="text-center">
              <tr>
                <td class="masque">ID</td>
                <td>N°Reference</td>
                <td>Objet</td>
                <td>Destinateur</td>
                <td>Expediteur</td>
                <td colspan="2">Action</td>
              </tr>
          </thead>
          <!-- //Affichage dans le tebleau -->
          <tbody>
              @foreach($crst as $crs)
              <tr>
                <td class="masque">{{$crs->id}}</td>
                <td>{{$crs->num_reference}}</td>
                <td>{{$crs->objet}}</td>
                <td>{{$crs->destinateur}}</td>
                <td>{{$crs->id_utilisateurs}}</td>
                <td>
                  <a href="#"class="btn btn-success editer" >Mod</a>
                  <button class="btn btn-danger edit"data-bs-toggle="modal" data-bs-target="#Modalsup">Supp</button>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>

      <!-- debut Modal envoyer courriers -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter Courriers</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action= "{{ action('CourriersSortantsController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">N° Référence</label>
                            <input type="text" class="form-control" name="num_reference" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Obet </label>
                            <input type="text" class="form-control" name="objet" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Destinateur</label>
                            <input type="text" class="form-control" name="destinateur" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Expéditeur</label>

                            <select name="id_utilisateurs " id="">
                              @foreach ($bara as $voila)
                                <option value=""><strong>{{ $voila->nom}}  {{ $voila->prenom}}</strong></option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Le Courrier</label>
                          <input type="file" class="form-control" name="destinateur" >
                      </div>
                      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin modal envoyer --> 

      <!-- debut Modal modifier courriers --> 
      <div class="modal fade" id="modif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter utilisateur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/courriers_sortants" id="modformcour" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">							
                        <div class="mb-3">
                            <label for="" class="form-label">N° Référence</label>
                            <input type="text" class="form-control" id="num_reference" name="num_reference" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Obet </label>
                            <input type="text" class="form-control" id="objet" name="objet" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Destinateur</label>
                            <input type="text" class="form-control" id="destinateur" name="destinateur" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Expéditeur</label>
                            <input type="text" class="form-control" id="id_utilisateurs" name="id_utilisateurs" >
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin modal modifier -->

      <!-- debut modal supprimer -->
      <div class="modal fade" id="Modalsup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="/courriers_sortants" id="deleteForm" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="mb-3">
                                <h6>Voulez-vous vraiment supprimer cette ligne?</h6>
                            </div>
                            <input type="hidden" name="_method" value="DELETE">
                        </div>  
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                            <button type="submit" class="btn btn-danger">Oui</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
      <!-- fin modal supprimer -->
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

 <script>
      $(document).ready( function () 
      {
          $('#datatable').DataTable();
      } );
  </script>

  {{-- Hide content of table --}}

  <script>
      $(document).ready( function () {
          $('.masque').hide();
      } );
  </script>

  {{-- End of hide --}}

  <script type="text/javascript">
    
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable();
  
    table.on('click','.editer', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);
    
        $('#num_reference').val(data[1]);
        $('#objet').val(data[2]);
        $('#destinateur').val(data[3]);
    
        $('#modifcoursortants').attr('action', '/courrierrs_sortants/'+data[0]);
        $('#modif').modal('show');
    });

    // Start Delete//
    table.on('click','.delete', function()
     {
        $tr = $(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }

        var data = table.row($tr).data();
        console.log(data);
        $('#deleteForm').attr('action', '/courrierrs_sortants/'+data[0]);
        $('#Modalsup').modal('show');
    });

  //End Delete//

});
</script>

</body>

</html>