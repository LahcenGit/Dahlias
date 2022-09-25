@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Modifier Etudiant</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Etudiant</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Etudiant</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/students/'.$student->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Nom et prénom* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{$student->name}}" name="name" placeholder="Nom et prénom" required>
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Téléphone* :</label>
                                        <input type="text"  class="form-control input-default @error('phone') is-invalid @enderror" value="{{$student->phone}}" name="phone" placeholder="+213 xx xx xx xx xx" required>
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
                                            <input type="date"  class="form-control input-default @error('date_birth') is-invalid @enderror" value="{{$student->date_birth}}" name="date_birth" required>
                                            @error('date_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label>Lieu de naissance* :</label>
                                        <input type="text"  class="form-control input-default @error('place_birth') is-invalid @enderror" value="{{$student->place_birth}}" name="place_birth" placeholder="Tlemcen" required>
                                        @error('place_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>         
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Email*:</label>
                                            <input type="text"  class="form-control input-default @error('email') is-invalid @enderror" value="{{$student->email}}" name="email" placeholder="mohamed@gmail.com" >
                                            @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                
                                </div>                            
                                <button type="submit" class="btn btn-primary mt-3 text-center" >Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection