@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Editions</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Editions</a></li>
                </ol>
            </div>
        </div>
    
      
        <!-- row -->
        <div class="row ">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des editions</h4>
                        <a href="{{url('/dashboard-admin/editions/create')}}" type="button" class="btn btn-primary mt-3" >Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Edition</th>
                                        <th>Formation</th>
                                        <th>Formateur</th>
                                        <th>Nombre de séances</th>
                                        <th>Prix 1</th>
                                        <th>Prix 2</th>
                                        <th>Prix 3</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($editions as $edition)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$edition->group}}</td>
                                            <td><strong>{{$edition->course->name}}</strong></td>
                                            <td><strong>{{$edition->instructor->name}} </strong></td>
                                            <td><strong>{{$edition->nbr_session}} </strong></td>
                                            @if($edition->price_one)
                                            <td><strong>{{$edition->price_one}} </strong></td>
                                            @else
                                             <td><strong><i class="fa fa-minus"></i> </strong></td>
                                            @endif
                                            @if($edition->price_two)
                                            <td><strong>{{$edition->price_two}} </strong></td>
                                            @else
                                             <td><strong><i class="fa fa-minus"></i> </strong></td>
                                            @endif
                                             @if($edition->price_tree)
                                            <td><strong>{{$edition->price_tree}} </strong></td>
                                            @else
                                             <td><strong><i class="fa fa-minus"></i> </strong></td>
                                            @endif
                                            <td><strong>{{$edition->created_at->format('Y-m-d')}} </strong></td>
                                            <td>
                                                <form action="{{url('dashboard-admin/editions/'.$edition->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <div class="d-flex">
                                                <a href="{{url('dashboard-admin/presence-list/'.$edition->id)}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-print"></i></a>
                                                    <a href="{{url('dashboard-admin/student-list/'.$edition->id)}}"  class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                <a href="{{url('dashboard-admin/editions/'.$edition->id.'/edit')}}"  class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button class=" btn btn-danger shadow btn-xs sharp  "onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
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

