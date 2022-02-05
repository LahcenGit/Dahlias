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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Les inscriptions</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des inscriptions</h4>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Formation</th>
                                        <th>Name</th>
                                
                                        <th>Téléphone</th>
                                        <th>Age</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$registration->course->name}}</td>
                                        <td><strong>{{$registration->name}}</strong></td>
                                        <td><strong>{{$registration->phone}} </strong></td>
                                        <td><strong>{{$registration->age}} ans </strong></td>
                                        <td><strong>{{$registration->created_at}} </strong></td>
                                        @if ($registration->status == 1 )
                                        <td><span class="badge bg-warning">En Attente</span></td>
                                        @elseif($registration->status == 2)
                                        <td><span class="badge bg-success">Validé</span></td>
                                        @elseif($registration->status == 3)
                                        <td><span class="badge bg-success">Rembourser</span></td>
                                        @else
                                        <td><span class="badge bg-danger">Annulé</span></td>
                                        
                                        @endif
                                       
                                        <td>
                                            <form action="{{url('dashboard-admin/registrations/'.$registration->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            <div class="d-flex">
                                                @if ($registration->status == 1)
                                                <a href="{{url('dashboard-admin/registration-approuve/'.$registration->id)}}" onclick=" return confirm('Voulez-vous valider la commande ?')" class="btn  btn-primary  show-order" style="margin-right: 3px;"><i class="mdi mdi-check"></i></a>
                                                <a href="{{url('dashboard-admin/registration-cancel/'.$registration->id)}}" onclick="return confirm('Voulez-vous annuler la commande ?')" class="btn  btn-danger  show-order" style="margin-right: 3px;"><i class="mdi mdi-close"></i></a>
                                                @endif
                                                @if ($registration->status == 2)
                                                <a href="{{url('dashboard-admin/registration-cancel/'.$registration->id)}}" onclick="return confirm('Voulez-vous annuler la commande ?')" class="btn  btn-danger  show-order" style="margin-right: 3px;"><i class="mdi mdi-close"></i></a>
                                                @endif
                                                @if ($registration->status == 3)
                                                <a href="{{url('dashboard-admin/registration-approuve/'.$registration->id)}}" onclick=" return confirm('Voulez-vous valider la commande ?')" class="btn  btn-primary  show-order" style="margin-right: 3px;"><i class="mdi mdi-check"></i></a>
                                                @endif
                                                
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

