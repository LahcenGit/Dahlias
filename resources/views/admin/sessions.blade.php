@extends('layouts.dashboard-admin')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Les séances</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Les séances</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des séances</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Formation</th>
                                        <th>Edition</th>
                                        <th>Séance</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sessions as $session)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$session->course->name}}</td>
                                        <td><strong>Edition {{$session->group->group}}</strong></td>
                                        <td><strong>Séance {{$session->session}} </strong></td>
                                        <td><strong> {{$session->date}} </strong></td>
                                        <td>
                                             <div class="d-flex">
                                               <form action="" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                 <a href="{{url('dashboard-admin/presences/'.$session->course_id.'/'.$session->group_id.'/'.$session->session)}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                <a href="{{url('dashboard-admin/edit-presences/'.$session->course_id.'/'.$session->group_id.'/'.$session->session)}}"  class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button class=" btn btn-danger shadow btn-xs sharp mr-1"onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
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


