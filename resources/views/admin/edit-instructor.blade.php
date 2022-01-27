@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Modifier Formateur</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Formateur</a></li>
                </ol>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Formateur</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('dashboard-admin/instructors/'.$instructor->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Name* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{$instructor->name}}" name="name" placeholder="name">
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email(optionnel) :</label>
                                        <input type="text"  class="form-control input-default @error('email') is-invalid @enderror" value="{{$instructor->email}}}"  name="email" placeholder="email">
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                             
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>N°de telephone* :</label>
                                        <input type="text"  class="form-control input-default @error('phone') is-invalid @enderror" value="{{$instructor->phone}}" name="phone" placeholder="+213 xx xx xx">
                                        @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Date de naissance* :</label>
                                        <input type="date"  class="form-control input-default @error('date_of_birth') is-invalid @enderror" value="{{$instructor->date_of_birth}}" name="date_of_birth" placeholder="date">
                                        @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            

                            <div class="form-row">
                              
                                <div class="form-group col-md-6">
                                    <label>Fonction* :</label>
                                    <input type="text"  class="form-control input-default @error('function') is-invalid @enderror" value="{{$instructor->function}}" name="function" placeholder="function">
                                    @error('function')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                
                               
                            </div>
                                <button type="submit" class="btn btn-primary mt-3 text-center">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection