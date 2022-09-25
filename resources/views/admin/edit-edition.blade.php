@extends('layouts.dashboard-admin')

<style>
.fontawesome {
    font-family: "Font Awesome 5 Free", "Font Awesome 5 Brands", sans-serif;
    font-weight: 900;
  }
</style>
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Modifier Edition</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard-admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier édition</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier édition</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('dashboard-admin/editions/'.$edition->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                                @csrf
                             
                                <div class="form-group">
                                    
                                    <label>Formation* :</label>
                                    
                                    <select class="form-control  @error('course') is-invalid @enderror" id="select-course"  class="selectpicker" data-live-search="true" name="course">
                                      <option value=0>Nothing selected</option>
                                      @foreach($courses as $course)
                                       <option value="{{$course->id}}" @if($edition->course_id == $course->id) selected @endif>{{$course->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    
                                    <label>Formateur* :</label>
                                    
                                    <select class="form-control" id="select-instructor"  class="selectpicker" data-live-search="true" name="instructor">
                                        @foreach($instructors as $instructor)
                                        <option value="{{$instructor->instructor_id}}" @if($edition->instructor_id == $instructor->instructor_id) selected @endif>{{$instructor->instructor->name}} </option>
                                        @endforeach
                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Edition* :</label>
                                    <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{$edition->group}}" name="name" >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                 <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('select-instructor-scripts')
    
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
			url: '/get-instructor/' + id,
			type: "GET",

			success: function (res) {
	
				$.each(res, function(i, res) {
                   
				data = data + '<option value="'+ res.instructor_id+'" >'+ res.instructor.name+ '</option>';
				});
				
				
				$('#select-instructor').html(data);
				$('#select-instructor').selectpicker('refresh');
				$('#select-instructor').selectpicker('refresh');

			}
		});

	});
</script>
@endpush