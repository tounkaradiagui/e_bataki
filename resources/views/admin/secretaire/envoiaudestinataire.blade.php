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
          <div class="tab-content card-block">
            <div class="tab-pane active" id="home3" role="tabpanel">
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
            
                <marquee behavior="" direction="">
                    <h6 class="text-danger">Veuillez verifier les informations avant d'envoyer le formulaire</h6>
                </marquee>  
                

                <form action="{{ route('sendcourriertodestinataire', $liste->id) }}" class="px-md-2" method="POST">
                    @csrf
                    @method('PATCH')
                        {{-- Try --}}                      
                        <div class="row">
                            <div class="col mb-4">
                              <div class="form-outline datepicker">
                                <label for="exampleDatepicker1" class="form-label">Numero de References</label>
                                <input type="text" class="form-control" id="exampleDatepicker1" name="adresse" readonly value="{{ $liste->num_reference }}"/>
                              </div>
          
                            </div>
                            <div class="col-md mb-4">
                              <label for="exampleDatepicker1" class="form-label">Objet</label>
                              <input type="text" class="form-control" id="exampleDatepicker1" name="phone" readonly value="{{ $liste->objet }}"/>
                            </div>
                            
                        </div> 
                        <div class="form-outline mb-4">
                            <label class="form-label fw-bold" for="form3Example1q">Expediteur</label>
                            <input type="text" class="form-control" id="exampleDatepicker1" name="phone" readonly value="{{ $liste->expediteur }}"/>
                          </div> 
                        <div class="form-outline mb-4">
                            <label class="form-label fw-bold" for="form3Example1q">Destinateur</label>
       
                            <select name="id_utilisateurs" class="form-control" id="exampleDatepicker1">
                                @foreach ($destinateur as $send)
                                <option value="{{ $send->id }}">{{ $send->prenom }}  {{ $send->nom }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                      
                      <div class="modal-footer">  
                        <button type="button" class="btn text-white" style="background-color:#0972a1" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn text-white" style="background-color:#0b6628">Valider</button>
                      </div>                     
                  </form>
                
            </div>

        </div>
  </div>
@endsection

