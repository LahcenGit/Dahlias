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
                                        <h3 class="mb-1">{{number_format($total_payment)}} Da</h3>
                                        <span class="text-success">Total des versemnents</span>
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
                                        <h3 class="mb-1">{{number_format($total_load)}} Da</h3>
                                        <span class="text-success">Total des charges</span>
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
                                        <h3 class="mb-1">{{$total_user}}</h3>
                                        <span class="text-success">Etudiants</span>
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
                                        <h3 class="mb-1">{{number_format($rest)}} Da</h3>
                                        <span class="text-success">Reste à verser</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Les dernières prés-inscriptions</h4>
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
                                                <th><strong>Statut</strong></th>
                                                <th><strong>Nombre d'appels et sms</strong></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($registrations as $registration)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$registration->course->name}}</td>
                                                <td><strong>{{$registration->name}}</strong></td>
                                                <td><strong>{{$registration->phone}} </strong></td>
                                                @if ($registration->status == 1 )
                                                    <td><span class="badge badge-warning">En Attente</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                    @elseif($registration->status == 2)
                                                    <td><span class="badge badge-light">Va passer</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                    @elseif($registration->status == 3)
                                                    <td><span class="badge badge-info">Interessé(e)</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                    @elseif($registration->status == 4)
                                                    <td><span class="badge badge-dark">Injoignable</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                    @elseif($registration->status == 5)
                                                    <td><span class="badge badge-secondary">Appels + sms</span></td>
                                                    <td><strong>{{$registration->remark}} </strong></td>
                                                    @elseif($registration->status == 6)
                                                    <td><span class="badge badge-success">Validé</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                    @else
                                                    <td><span class="badge badge-danger">Annuler</span></td>
                                                    <td><strong><i class="fa fa-minus"></i> </strong></td>
                                                @endif
                                             </tr>
                                           
                                          @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Les dernières inscriptions</h4>
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
                                                <th><strong>Etudiant</strong></th>
                                                <th><strong>Formation</strong></th>
                                                <th><strong>Group</strong></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($final_registrations as $final_registration)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td><strong>{{$final_registration->user->name}}</strong></td>
                                                    <td>{{$final_registration->course->name}}</td>
                                                    <td><strong>{{$final_registration->group->group}} </strong></td>
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