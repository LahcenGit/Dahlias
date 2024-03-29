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
                        <a href="{{url('/dashboard-admin/courses/create')}}" type="button"  class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Désignation</th> 
                                        <th>Categorie</th>
                                        <th>Durée</th>
                                        <th>Niveau</th>
                                        <th>Prix</th>
                                        <th>Date</th>
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
                                        <td><strong>{{$course->duration}} </strong></td>
                                        
                                        <td>
                                            @if($course->level == 'Débutant')
                                            <strong>
                                            Débutant 
                                            </strong>
                                            @elseif($course->level == 'Intermediare')
                                            <strong>
                                            Intermédiare 
                                            </strong>
                                            @else
                                            <strong>
                                            Avancé
                                            </strong>
                                            @endif
                                            </td>
                                        <td><strong>{{$course->price}} DA </strong></td>
                                        <td><strong>{{$course->created_at->format('Y-m-d')}}  </strong></td>
                                        <td>
                                            @if($course->status == 'Lancee')
                                            <strong>
                                            Lancée
                                            </strong>
                                            @else
                                            <strong>
                                            Prochainement
                                            </strong>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{url('dashboard-admin/courses/'.$course->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            <div class="d-flex">
                                                <a href="{{url('dashboard-admin/courses/'.$course->id.'/edit')}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button   class=" btn btn-danger shadow btn-xs sharp"onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
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

