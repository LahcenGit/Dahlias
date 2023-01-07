@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Ajouter Etudiant</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Inscription</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter Inscription</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/final-registrations')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Etudiants* :</label>
                                        <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="student"  require>
                                          @foreach($students as $student)
                                           <option value="{{$student->id}}">{{$student->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                 </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Formation* :</label>
                                        <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="course" id="select-course">
                                        <option>Nothing selected</option>
                                          @foreach($courses as $course)
                                           <option value="{{$course->id}}">{{$course->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                 </div>
                             
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Edition* :</label>
                                         <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="edition" id="select-edition" require>
                                         
                                        </select>
                                    </div>
                                </div>
                                 
                                <button type="submit" class="btn btn-primary mt-3 text-center" >Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection
@push('select-edition-scripts')
    
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
 });
	  
	$("#select-course").change(function() {
  
		var id = $(this).val();
		var data ="";
	   
		$.ajax({
			url: '/get-edition/' + id,
			type: "GET",

			success: function (res) {
	
				$.each(res, function(i, res) {
                    
				data = data + '<option value="'+ res.id+ '" >'+ res.group+ '</option>';
				});
				
				
				$('#select-edition').html(data);
				$('#select-edition').selectpicker('refresh');
				$('#select-edition').selectpicker('refresh');

			}
		});

	});
</script>
@endpush