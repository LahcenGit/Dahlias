@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Employé</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard-admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Employé</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter Un Employé</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('dashboard-admin/workers')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                 <div class="form-row">
                                    <div class="form-group col-6">
                                            <label>Nom complet* :</label>
                                            <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="nom complet" name="name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                    <div class="form-group col-6">
                                            <label>Email(optionnel) :</label>
                                            <input type="text"  class="form-control input-default @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="mohamed@gmail.com" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                 </div>
                                 
                                 <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Téléphone* :</label>
                                        <input type="text"  class="form-control input-default @error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" placeholder="+213 xx xx xx xx xx" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Date de naissance(optionnel) :</label>
                                        <input type="date"  class="form-control input-default @error('date_birth') is-invalid @enderror" value="{{old('date_birth')}}" name="date_birth" >
                                            @error('date_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Fonction* :</label>
                                        <input type="text"  class="form-control input-default @error('job') is-invalid @enderror" value="{{old('job')}}" name="job"placeholder="Fonction" required>
                                            @error('job')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                 </div>
                                 <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
