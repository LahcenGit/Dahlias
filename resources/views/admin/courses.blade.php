@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Formations</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Formations</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des formations</h4>
                        <a href="{{url('/dashboard-admin/courses/create')}}" type="button" style="background-color:#16B4B7;border-color:#16B4B7;" class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th> 
                                        <th>Categorie</th>
                                        <th>Formateur</th>
                                        <th>Durée</th>
                                        <th>Niveau</th>
                                        <th>Prix</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$course->name}}</td>
                                        <td><strong>{{$course->category->name}}</strong></td>
                                        <td><strong>{{$course->instructor->name}} </strong></td>
                                        <td><strong>{{$course->duration}} </strong></td>
                                        <td><strong>{{$course->level}} </strong></td>
                                        <td><strong>{{$course->price}} DA </strong></td>
                                        <td><strong>{{$course->status}} </strong></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href=""  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button   class="delete-customer btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                            </div>												
                                        </td>												
                                    </tr>
                                   
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
</div>
</div>

@endsection

