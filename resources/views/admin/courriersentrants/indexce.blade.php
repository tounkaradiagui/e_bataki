@extends('layouts.admin')

@section('content')


<div class="container mt-3">
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
    <div class="card">
      <div class="card-header">Envoie de courriers entrants
        <a href="" class="btn btn-primary btn-sm float-end text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" >Envoyer</a>
      </div>
      <div class="card-body">
      <table class="table table-bordered" id="datatable">
            <thead class="text-center">
                <tr>
                  <td class="masque">ID</td>
                  <td>N°Reference</td>
                  <td>Objet</td>
                  <td>Expediteur</td>
                  <td>Secretaire</td>
                  <td>vos courriers</td>

                  <td>Action</td>
                </tr>
            </thead>
            <!-- //Affichage dans le tebleau -->
            <tbody>
                @foreach($crst as $crs)
                <tr>
                    <td class="masque">{{$crs->id}}</td>
                    <td>{{$crs->num_reference}}</td>
                    <td>{{$crs->objet}}</td>
                    <td>{{$crs->expediteur}}</td>
                    <td>{{$crs->secretaires->prenom}}   {{$crs->secretaires->nom}}</td>
                    <td><a href="{{ url('courriers/entrants/'.$crs->pdf_courriers) }}" download>Fichier joint:</a></td>

                    <td>
                      <a href="{{ url('courriers/entrants/'.$crs->pdf_courriers) }}" view class="btn btn-primary">Voir</a>
                      <button class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#modifcoursortants">Mod</button>
                      <button class="btn btn-danger edit" data-bs-toggle="modal" data-bs-target="#deleteModal">Supp</button>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
</div>

<!-- debut Modal envoyer courriers -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action= "{{ URL('admin/courrierentrandd') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">							
                  <div class="mb-3">
                      <label for="" class="form-label">N° Référence</label>
                      <input type="text" class="form-control" name="num_reference" >
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Objet </label>
                      <input type="text" class="form-control" name="objet" >
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Expediteur</label>
                      <input type="text" class="form-control" name="expediteur" >
                  </div>
                

                  <div class="mb-3">
                      <label for="" class="form-label">Secretaire</label>

                      <select name="id_secretaire">
                        @foreach ($bara as $voila)
                          <option value="{{ $voila->id}}"><strong>{{ $voila->nom}}  {{ $voila->prenom}}</strong></option>
                        @endforeach
                      </select>
                    
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Le Courrier</label>
                    <input type="file" class="form-control" name="pdf_courriers" >
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


<div class="container">




  <div class="card">
    <div class="card-header">
      <h3><a  class="btn btn-primary btn-sm float-end text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Envoyer</a></h3>
    
              
    
<!-- debut Modal envoyer courriers -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action= "{{ URL('admin/courrierentrandd') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="modal-body">							
                          <div class="mb-3">
                              <label for="" class="form-label">N° Référence</label>
                              <input type="text" class="form-control" name="num_reference" >
                          </div>
                          <div class="mb-3">
                              <label for="" class="form-label">Objet </label>
                              <input type="text" class="form-control" name="objet" >
                          </div>
                          <div class="mb-3">
                              <label for="" class="form-label">Expediteur</label>
                              <input type="text" class="form-control" name="expediteur" >
                          </div>
                        
    
                          <div class="mb-3">
                              <label for="" class="form-label">Secretaire</label>
    
                              <select name="id_secretaires " id="">
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
        <div class="col">
          <h2>La liste des courriers envoyés</h2>
        </div>
             
     
    </div>

    
           <!-- debut Modal modifier courriers -->
          <div class="modal fade" id="modifcoursortants" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="" class="form-label">Objet </label>
                                <input type="text" class="form-control" id="objet" name="objet" >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Expediteur</label>
                                <input type="text" class="form-control" id="expediteur" name="destinateur" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Secretaire</label>
                                <input type="text" class="form-control" id="id_secretaires" name="id_utilisateurs" >
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
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
    
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

@endsection
