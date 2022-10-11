@extends('layouts.secretairelayout')

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
                    <td>Destinateurs</td>
                    <td>vos courriers</td>
  
                    <td>Action</td>
                  </tr>
              </thead>
              <!-- //Affichage dans le tebleau -->
              <tbody>
                  @foreach ($mescourriers as $liste)
                    
                  <tr>                      	
                    
                      <td class="masque">{{ $liste->id }}</td>
                      <td>{{ $liste->num_reference }}</td>
                      <td>{{ $liste->objet }}</td>
                      <td>{{ $liste->expediteur }}</td>
                      <td>{{ $liste->id_utilisateurs }}</td>
                      <td><a href="{{ url('courriers/entrants/'.$liste->pdf_courriers) }}" download>Fichier joint:</a></td>
  
                      <td>
                        <a href="{{ url('courriers/entrants/'.$liste->pdf_courriers) }}" view target="_blank"  class="btn btn-primary">Voir</a>
                        <a href="{{ route('sendformuser', $liste->id) }}" class="btn btn-sm btn-success" >send</a>
                        <button class="btn btn-danger edit" data-bs-toggle="modal" data-bs-target="#deleteModal">Supp</button>
                        
                      </td>
                  </tr>
                  @endforeach
                  
              </tbody>
            </table>
        </div>
      </div>
  </div>
@endsection

