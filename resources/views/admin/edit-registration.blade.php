@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Modifier l'inscription</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Inscription</a></li>
                </ol>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Inscription</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('dashboard-admin/registrations/'.$registration->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="form-row">
                                    <h5 class="card-title">{{$registration->course->name}}</h5>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{$registration->name}}" name="name" >
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Téléphone :</label>
                                        <input type="text"  class="form-control input-default @error('phone') is-invalid @enderror" value="{{$registration->phone}}"  name="phone" >
                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Date de naissance :</label>
                                        <input type="date"  class="form-control input-default @error('age') is-invalid @enderror" value="{{$registration->age}}"  name="age" >
                                        @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Statut :</label>
                                        <select class="form-control  @error('statut') is-invalid @enderror" id="select-status"  class="selectpicker" data-live-search="true" name="status" >
                                            <option value="1" @if ($registration->status == 1 ) selected @endif>En Attente</option>
                                            <option value="2" @if ($registration->status == 2 ) selected @endif>Va passer</option>
                                            <option value="3" @if ($registration->status == 3 ) selected @endif>Intéressé</option>
                                            <option value="4" @if ($registration->status == 4 ) selected @endif>Injoignable</option>
                                            <option value="5" @if ($registration->status == 5 ) selected @endif>Appel + sms</option>
                                            <option value="6" @if ($registration->status == 6 ) selected @endif>Validé</option>
                                            <option value="7" @if ($registration->status == 7 ) selected @endif>Annuler</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" id="nbr" style="display:none;">
                                        <label>Remarque Appel+sms :</label>
                                        <input type="text"  class="form-control input-default "  name="remark" >
                                    </div>
                                </div>
                                  <button type="submit" class="btn btn-primary mt-3 text-center">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection
@push('select-status-scripts')
<script>
$( "#select-status" ).change(function() {
 var value = $( "#select-status" ).val();
 if(value == 5){
    $("#nbr").css("display", "block");
 }
 else{
    $("#nbr").css("display", "none");
 }
});
</script>
@endpush