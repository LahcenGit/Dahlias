@extends('layouts.dashboard-admin')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>La liste de présence</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">La liste de présence</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table de présence </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Etudiant</th>
                                        <th>Téléphone</th>
                                        <th>Présent ?</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($presences as $presence)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$presence->user->name}}</td>
                                        <td>{{$presence->user->phone}}</td>
                                        <td><strong>@if($presence->present == 1) Présent @else Absent @endif</strong></td>
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


