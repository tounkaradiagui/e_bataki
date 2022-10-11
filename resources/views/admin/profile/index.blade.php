@extends('layouts.admin')
@section('content')
<section class="py-5">
    @if (session()->has("success"))
        <div class="alert alert-success">
            <h3>{{session()->get('success')}}</h3>
        </div>           
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul >               
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach              
            </ul>
        </div>
                
     @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #0050e3;"><h3> Mon profile</h3></div>
                    <div class="card-body">
                        <form action="{{url('admin/mon-profile-update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nom complet</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fonction</label>
                                        <input type="text" class="form-control" readonly value="{{ Auth::user()->status}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Adresse</label>
                                        <input type="text" class="form-control" name="adresse" value="{{ Auth::user()->adresse}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone}}">
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->email}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" name="image" id="" class="form-control">
                                    <img src="{{asset('uploads/profile/' .Auth::user()->image)}}" class="w-45" alt="" width="100px" height="100px">
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary text-white">Valider les modifications</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection