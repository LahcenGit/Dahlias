@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Formateurs</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Formateurs</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des formateurs</h4>
                        <a href="{{url('/dashboard-admin/instructors/create')}}" type="button" class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Date de naissance</th>
                                        <th>Fonction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instructors as $instructor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$instructor->name}}</td>
                                        <td><strong>{{$instructor->email}}</strong></td>
                                        <td><strong>{{$instructor->phone}} </strong></td>
                                        <td><strong>{{$instructor->date_of_birth}} </strong></td>
                                        <td><strong>{{$instructor->function}} </strong></td>
                                        <td>
                                            <form action="{{url('dashboard-admin/instructors/'.$instructor->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            <div class="d-flex">
                                                <a href="{{url('dashboard-admin/instructors/'.$instructor->id.'/edit')}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button   class="delete-customer btn btn-danger shadow btn-xs sharp  "onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                            </div>	
                                            </form>											
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

