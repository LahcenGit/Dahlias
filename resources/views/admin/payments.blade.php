@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Les Versements</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Versements</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des versements</h4>
                        <a href="{{url('/dashboard-admin/payments/create')}}" type="button" class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Etudiant</th>
                                        <th>N° de téléphone</th>
                                        <th>Formation</th>
                                        <th>Group</th>
                                        <th>Montant</th>
                                        <th>N° de bon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$payment->student->name}}</td>
                                        <td>{{$payment->student->phone}}</td>
                                        <td><strong>{{$payment->returnCourse()->name}}</strong></td>
                                        <td><strong>{{$payment->group->group}}</strong></td>
                                        <td><strong>{{$payment->amount}} </strong></td>
                                        <td><strong>{{$payment->N_bon}} </strong></td>
                                        
                                       
                                        <td>
                                            <form action="" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            <div class="d-flex">
                                                <a href="#"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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

