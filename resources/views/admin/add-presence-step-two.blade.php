@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Liste de présence</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Liste de présence</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h3 >{{$course->name}}</h3> 
                                <p> Edition <b>{{$group->group}}</b> , Séance <b>{{$session}} </b> </p>
                            </div>         
                        </div>
                        <div class="table-responsive">
                            <form action="{{url('/store-presence')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Etudiant</th> 
                                            <th>Présence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->user->name}}</td>
                                                <td> 
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="{{$student->user_id}}" value="{{$student->user_id}}">
                                                    </label>
                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <input type="hidden" value="{{$course->id}}" name="course">
                                        <input type="hidden" value="{{$group->id}}" name="group">
                                        <input type="hidden" value="{{$session}}" name="session">
                                        <input type="hidden" value="{{$date}}" name="date">
                                    </tbody>
                                </table>
                                <button  class="btn btn-primary mt-3 text-center " >Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
</div>
</div>

@endsection

