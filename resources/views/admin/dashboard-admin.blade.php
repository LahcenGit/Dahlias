@extends('layouts.dashboard-admin')
@section('content')
<style>
    .card-body{
        padding: 20px !important;
    }
</style>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-lg-12">
                <div class="row">
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="card-body pb-0 px-3 pt-2">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-1">{{$courses}}</h3>
                                        <span class="text-success">Formations</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="card-body pb-0 px-3 pt-2">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-1">{{$instructors}}</h3>
                                        <span class="text-success">Formateurs</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="card-body pb-0 px-3 pt-2">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-1">{{$allRegistrations}}</h3>
                                        <span class="text-success">Inscrits</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="card-body pb-0 px-3 pt-2">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-1">{{$registrationsWaiting}}</h3>
                                        <span class="text-success">Inscriptions en attentes</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   
                   
                   
                    <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1" style="height:250px;">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="#">
                                                
                                                <h6 class="mb-0">Inscriptions en attentes : <strong class="text-warning">{{$registrationsWaiting}}</strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                
                                                <h6 class="mb-0"> Inscriptions remboursées :  <strong class="text-info">{{$registrationReimburse}}</strong></h6>
                                              
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                
                                                <h6 class="mb-0">Inscriptions annulées : <strong class="text-danger">{{$registrationCancel}}</strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                       
                                                <h6 class="mb-0">Inscriptions validées : <strong class="text-success">{{$registrationValid}}</strong> </h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-xxl-8 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Les cinq dernières inscriptions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width:20px;">
                                                    <div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                        <label class="custom-control-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th><strong>Formation</strong></th>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Téléphone</strong></th>
                                                <th><strong>Accepter</strong></th>
                                                <th><strong>Remarque</strong></th>
                                                <th><strong>Statut</strong></th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($registrations as $registration)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$registration->course->name}}</td>
                                                <td><strong>{{$registration->name}}</strong></td>
                                                <td><strong>{{$registration->phone}} </strong></td>
                                                
                                                <td><strong>{{$registration->accept}} </strong></td>
                                                <td><strong>{{$registration->remarque}} </strong></td>
                                                @if ($registration->status == 1 )
                                                <td><span class="badge badge-warning">En Attente</span></td>
                                                @elseif($registration->status == 2)
                                                <td><span class="badge badge-success">Validé</span></td>
                                                @elseif($registration->status == 3)
                                                <td><span class="badge badge-info">Rembourser</span></td>
                                                @else
                                                <td><span class="badge badge-danger">Annulé</span></td>
                                                
                                                @endif
                                               
                                              												
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
    </div>
</div>
@endsection