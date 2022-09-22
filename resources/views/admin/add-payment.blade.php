@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Ajouter Versement</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter Versement</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter versement</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/payments')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label>Formation* :</label>
                                            <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="course" id="select-course">
                                            <option>Nothing Selected</option>
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Edition* :</label>
                                            <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="edition" id="select-edition" require>
                                            <option value="0">Nothing selected</option>
                                        </select>
                                            
                                       </div>
                                       <div class="form-group col-md-4">
                                        <label>Etudiant* :</label>
                                        <select type="text"  class="form-control invalid"  class="selectpicker" id="select-student"  data-live-search="true" name="student"  require>
                                        <option value="0">Nothing selected</option>
                                        </select>
                                    </div>
                                </div>         
                               
                               
                                <div class="form-row">
                                       <div class="form-group col-md-4">
                                            <label>Montant:</label>
                                            <input type="text"  class="form-control input-default" value="" id="amount" name="amount" placeholder="0.00" require >
                                            
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label>Le reste:</label>
                                            <input type="text"  class="form-control input-default the-rest"   placeholder="0.00" require >
                                            
                                       </div>

                                       <div class="form-group col-md-3 d-flex align-items-end">
                                         <a type="button " class="btn btn-secondary " id="calculate-amount">Calculer</a>
                                       </div>
                                </div> 
                               
                                <div class="form-row">
                                       <div class="form-group col-md-4">
                                            <label>N° de bon:</label>
                                            <input type="text"  class="form-control input-default" value="" name="n_bon" placeholder="0" require >
                                            
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

@push('calculat-amount-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('#calculate-amount').click(function() {
     
         var rest = 0;
         amount = $('#amount').val();
         id = $('#select-course').val();
        
         $.ajax({
			url: '/get-price-course/' + id,
			type: "GET",

			success: function (res) {
	            rest = parseInt(res.price) - amount ;
                $(".the-rest").val(rest);
               }
			});

});
        
</script>
@endpush
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
@push('select-student-scripts')
    
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
 });
	  
	$("#select-edition").change(function() {
  
		var id = $(this).val();
      
		var data ="";
	   
		$.ajax({
			url: '/get-student/' + id,
			type: "GET",

			success: function (res) {
	
				$.each(res, function(i, res) {
                    
				data = data + '<option value="'+ res.student.id+ '" >'+ res.student.name+ '</option>';
				});
				
				
				$('#select-student').html(data);
				$('#select-student').selectpicker('refresh');
				$('#select-student').selectpicker('refresh');

			}
		});

	});
</script>
@endpush
