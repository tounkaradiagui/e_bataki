@extends('layouts.admin')

@section('content')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Veuillez renseigner les champs suivants Svp !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/admin/secretaire')}}" method="post">
                @csrf


                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="nom" class="form-control">
                         @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Prénom</label>
                        <input type="text" name="prenom" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Adresse</label>
                        <input type="text" name="adresse" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Mot de Passe </label>
                        <input type="password"  class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Confirmer</label>
                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                   

                    

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Id_département</label>
                        <select name="id_departement" class="form-control">
                            @foreach ($departements as $departements )
                                <option value="{{$departements->id}}">{{$departements->nom}}</option>
                            @endforeach
                        </select>
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

<div class="container px-4">

    <div class="card mt-2 ">

        <div class="card-header">
            <h4>La liste des secrétaires
            <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
            </h4>
            
        </div>

        <div class="card-body" >
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error )
                        <div>{{$error}}</div>
                    @endforeach
                </div> 
            @endif

                    
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>ID Département</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($secretaires as $secretaires )
                        <tr>
                            
                            <td>{{ $secretaires->nom }}</td>
                            <td>{{ $secretaires->prenom }}</td>
                            <td>{{ $secretaires->adresse }}</td>
                            <td>{{ $secretaires->phone }}</td>
                            <td>{{ $secretaires->email }}</td>
                            <td>{{ $secretaires->id_departement }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>
     
@endsection