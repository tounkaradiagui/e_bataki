<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admint</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>

<!-- Modal d'ajout pour utilisateur -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action= "{{ action('AdminsController@store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">							
                    <div class="mb-3">
                        <label for="" class="form-label">Nom </label>
                        <input type="text" class="form-control" name="nom" >
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Prenom </label>
                        <input type="text" class="form-control" name="prenom" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Adresse physique </label>
                        <input type="text" class="form-control" name="adresse" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Telephone</label>
                        <input type="text" class="form-control" name="phone" >
                    </div>

                    
                    <div class="mb-3">
                        <label for="" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Mot de Passe </label>
                        <input type="password" class="form-control" name="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Confirmer</label>
                        <input type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                    </div>
                            
                    
                   
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

        </div>
       
      </div>
    </div>
  </div>

  {{-- Fin d'ajout utilisateur --}}

  {{-- Debut du Modal pour modifier --}}

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier un Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="/admins" id="editForm" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body">							
                    <div class="mb-3">
                        <label for="" class="form-label">Nom </label>
                        <input type="text" class="form-control" id="nom" name="nom" >
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Prenom </label>
                        <input type="text" class="form-control" id="prenom" name="prenom" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Adresse Physique </label>
                        <input type="text" class="form-control" id="adresse" name="adresse" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="phone" name="phone" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" >
                    </div>



                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>

        </div>
       
      </div>
    </div>
  </div>

  {{--  Fin du Modal pour modifier--}}


  
    {{-- Delete Modal --}}

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="/admins" id="deleteForm" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        
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
    

    {{-- End of delete  Modal --}}

 
  {{-- CArd avec la table --}}

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Ajouter Admin
                    </button>
                </div>
                <div class="col">
                    <h2>La liste des Administrateurs</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
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
      
        <table id="datatable" class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" class="th_1">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                
               
                <th scope="col">Departement</th>
                <th scope="col">Actions</th>

              </tr>
            </thead>

            <tbody>
               
                
                    
              
              <tr>
                <th scope="row" class="th_1"></th>
                <th scope="row"></th>   
               <td></td>
               <td></td>
               <td></td>
               <td></td>
              
              

               
                    
                
                <td></td>
                
                <td>
                    <a href="#" class="edit btn btn-primary btn-sm"  >Edit</a> 
                    <a href="#" class="delete btn btn-danger btn-sm"  >Supp</a> 
                    
              {{-- <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a> --}}
                </td>
              </tr>
           
            </tbody>
          

        </table>
    </div>
  </div>

</div>

{{-- Fin du card --}}

 <!-- JavaScript Bundle with Popper -->
 
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
        $('.th_1').hide(); 
    } );
</script>

{{-- End of hide --}}

<script type="text/javascript">
    
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable();
    
    
    table.on('click','.edit', function() {
    
    
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);
    

        $('#prenom').val(data[1]);
        $('#nom').val(data[2]);
        $('#adresse').val(data[3]);
        $('#phone').val(data[4]);
        $('#email').val(data[5]);
        $('#username').val(data[6]);
        $('#poste').val(data[7]);
       
    
        $('#editForm').attr('action', '/utilisateurs/'+data[0]);
        $('#editModal').modal('show');
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
        $('#deleteForm').attr('action', '/utilisateurs/'+data[0]);
        $('#deleteModal').modal('show');
    });

  //End Delete//

});
</script>
</body>
</html>