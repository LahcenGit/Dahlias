@extends('layouts.dashboard-admin')
@section('content')

<style>

  
</style>

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
          <div class="row mt-3 ">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body print-section rotated" id="printable">
                        <div class="d-flex justify-content-between mb-2">
                                <img src="{{asset('front/assets/images/logo.png')}}" height="100px" width="300px">
                                <div>
                                    <h3 >{{$course->name}}</h3> 
                                    <p> Edition :<b>{{$group->group}}</b> <br>Total des étudiants : <b>{{$total}}</b> </p>
                                </div>
                        </div>
                        <table class=" table table-bordered tab-border" >
                                    <tr>
                                        <th >#</th>
                                        <th  >Etudiant</th>
                                        <th >Téléphone</th>
                                         @for($i=0 ; $i<$group->nbr_session;$i++)
                                          <th>S{{$i+1}}</th>
                                         @endfor
                                    </tr>
                                    @foreach ($lists as $list)
                                        <tr>
                                            <th >{{$loop->iteration}}</th>
                                            <td>{{$list->user->name}}</td>
                                            <td>{{$list->user->phone}}</td>
                                            @for($i=0 ; $i<$group->nbr_session;$i++)
                                                <td ></td>
                                            @endfor
                                        </tr>
                                    @endforeach
                        </table>
                        <div class="float-right"><h5> Formateur : <b>{{$group->instructor->name}}</b></h5></div>
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