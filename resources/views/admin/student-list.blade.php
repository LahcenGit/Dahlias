@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Liste des étudiants</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Liste des étudiants</a></li>
                </ol>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
              <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0  printMe">
                <i class="btn-icon-prepend " data-feather="printer"></i>
                Imprimer
              </button>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body print-section" id="printable">
                        <div class="d-flex justify-content-between mb-2">
                                <img src="{{asset('front/assets/images/logo.png')}}" height="100px" width="300px">
                                <div>
                                    <h3 >{{$course->name}}</h3> 
                                    <p> Edition :<b>{{$group->group}}</b> <br>Total des étudiants : <b>{{$total}}</b> <br>Date: <b>{{$date->format('Y-m-d')}}</b></p>
                                </div>
                        </div>
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Etudiant</th>
                                        <th scope="col"> Montant versé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total_rest = 0;
                                    @endphp
                                    @foreach ($lists as $list)
                                    
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <th>{{$list->user->name}}</th>
                                            @if($list->payment())
                                                 <td>{{number_format($list->payment())}} Da</td>
                                            @else
                                                 <td><i class="fa fa-minus"></i></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                    <td colspan="2" style="text-align:right ; font-size: 17px;"><b>Total :</b></td>
                                    
                                    <td ><b style="font-size: 17px">{{ number_format($total_amount) }}  Da</b></td>
                                    
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('list-student-scripts')
    
<script>
$('.printMe').click(function(){
    $('#printable').printThis();
});
</script> 

@endpush