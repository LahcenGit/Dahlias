@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Générer rapport </span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Générer rapport</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Générer rapport</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Etudiants* :</label>
                                        <select type="text"  class="form-control invalid"   class="selectpicker"  data-live-search="true" name="session" id="select-student" required>
                                        <option>Nothing selected</option>
                                            @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}} - {{$student->date_birth}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Formation* :</label>
                                    <select type="text"  class="form-control invalid" class="selectpicker"  data-live-search="true" name="course" id="select-edition" required>
                                    <option>Nothing selected</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <button  class="btn btn-primary mt-3 text-center btn-generate" >Générer le rapport</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
    
@endsection
@push('select-course-payment-scripts')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
 });
	  
	$("#select-student").change(function() {
       
		var id = $(this).val();
        var data ="";
        $.ajax({
			url: '/get-course-group-report/' + id,
			type: "GET",

			success: function (res) {
	            
				$.each(res, function(i, res) {
                  
                data = data + '<option value="'+ res.group_id+ '" >'+ res.course.name + ' - édition '+res.group.group+'</option>';
                });
				$('#select-edition').html(data);
				$('#select-edition').selectpicker('refresh');
				$('#select-edition').selectpicker('refresh');
            }
        });
        
            $( ".btn-generate" ).click(function() {
                var group_id = $( "#select-edition" ).val();
                var user_id = $( "#select-student" ).val();
                window.location.replace('/dashboard-admin/report-student-payment/'+group_id+'/'+user_id);
            });
        
});
</script>
@endpush