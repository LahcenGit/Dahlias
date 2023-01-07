@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Exporter les emails</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard-admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Exporter les emails</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Exporter les emails</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                        <span class="btn btn-primary export-all-email-btn" >Exporter tous les emails </span>
                            <div class="form-row mt-3">
                                    <div class="form-group col-md-6">
                                        <label>Formation :</label>
                                        <select type="text"  class="form-control invalid" class="selectpicker"  data-live-search="true" name="course" id="select-course" required>
                                        <option>Nothing selected</option>
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <span class="btn btn-primary export-btn" >Exporter</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('export-email-scripts')
<script>
  $( ".export-btn" ).click(function() {
      var id = $('#select-course').val();
     
      window.location.replace('/dashboard-admin/export-email/'+id);
});

$( ".export-all-email-btn" ).click(function() {
      window.location.replace('/dashboard-admin/export-all-email/');
});
</script>
@endpush