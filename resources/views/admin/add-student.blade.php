@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Ajouter Etudiant</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter Etudiant</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter Etudiant</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/students')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Nom et prénom* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Nom et prénom" required>
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>N° Tél* :</label>
                                        <input type="text"  class="form-control input-default @error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" placeholder="n° télephone" required>
                                        @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                             
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Date de naissance* :</label>
                                            <input type="date"  class="form-control input-default @error('date_birth') is-invalid @enderror" value="{{old('date_birth')}}" name="date_birth" required>
                                            @error('date_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label>Wilaya* :</label>
                                        <select type="text"  class="form-control input-default @error('place_birth') is-invalid @enderror" value="{{old('place_birth')}}" id="sel1"  class="selectpicker" data-live-search="true" name="place_birth" required>
                                            @foreach($wilayas as $wilaya)
                                            <option value={{$wilaya->name}} @if($wilaya->name =='Tlemcen') selected @endif>{{$wilaya->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>         
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Email*:</label>
                                        <input type="text"  class="form-control input-default @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="email" >
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Genre :</label>
                                            <div class="form-group mb-0">
                                                <label class="radio-inline mr-3"><input type="radio" name="sexe" value="Homme" checked> Homme</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="sexe" value="Femme"> Femme</label>
                                                
                                            </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mt-3 text-center" >Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection