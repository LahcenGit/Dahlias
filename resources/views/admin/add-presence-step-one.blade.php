@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Renseignement de la liste de présence</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Renseignement de la liste de présence</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Renseignement de la liste de présence</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Formation* :</label>
                                    <select type="text"  class="form-control invalid" class="selectpicker"  data-live-search="true" name="course" id="select-course" required>
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
                                        <select type="text"  class="form-control invalid"   class="selectpicker"  data-live-search="true" name="edition" id="select-edition" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Séance* :</label>
                                        <select type="text"  class="form-control invalid"   class="selectpicker"  data-live-search="true" name="session" id="select-session" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Date* :</label>
                                    <input type="date" name="date" class="form-control invalid" id="date" required>
                                </div>
                            </div>
                            <button  class="btn btn-primary mt-3 text-center btn-go" >Suivant</button>
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
        var data ="<option>Nothing selected</option>";
	   
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
$("#select-edition").change(function() {
    var id = $(this).val();
     var data_two = "";
    $.ajax({
			url: '/get-session/' + id,
			type: "GET",

			success: function (res) {
	           
				for(var i=1 ; i<=res ;i++) {
                    
				data_two = data_two + '<option value="'+ i+ '" >'+ 'Séance '+ i+'</option>';
				}
				$('#select-session').html(data_two);
				$('#select-session').selectpicker('refresh');
				$('#select-session').selectpicker('refresh');

			}
		});
          $( ".btn-go" ).click(function() {
                var course_id = $( "#select-course" ).val();
                var group_id = $( "#select-edition" ).val();
                var session = $( "#select-session" ).val();
                var date = $( "#date" ).val();
                window.location.replace('/dashboard-admin/add-presence-step-two/'+ course_id +'/'+group_id +'/'+session +'/'+date);
            });
});
</script>
@endpush