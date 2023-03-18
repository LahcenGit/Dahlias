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
                                            <select type="text" title="selectionner..."  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="course" id="select-course" required>
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Edition* :</label>
                                            <select type="text"  class="form-control invalid"  title="selectionner..." class="selectpicker"  data-live-search="true" name="edition" id="select-edition" required>
                                        </select>
                                            
                                       </div>
                                       <div class="form-group col-md-4">
                                        <label>Etudiant* :</label>
                                        <select type="text"  class="form-control invalid" title="selectionner..."  class="selectpicker" id="select-student"  data-live-search="true" name="student"  required>
                                        </select>
                                    </div>
                                </div>         
                              {{--  <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Prix* :</label>
                                           <div class="form-group mb-0">
                                                <label class="radio-inline mr-3 "><input type="radio" name="check" value="price_one" checked> Prix 1</label>
                                                <label class="radio-inline mr-3 "><input type="radio" name="check" value="price_two"> Prix 2</label>
                                                <label class="radio-inline mr-3 "><input type="radio" name="check" value="price_tree"> Prix 3</label>
                                           </div>
                                        </div>
                                </div>      --}}   
                                <div class="form-row">
                                       <div class="form-group col-md-4">
                                            <label><b> Montant (Da):</b></label>
                                            <input type="text"  class="form-control input-default" value="" id="amount" name="amount" placeholder="0.00" required >
                                            
                                       </div>
                                     {{--  <div class="form-group col-md-4">
                                            <label>Le reste:</label>
                                            <input type="text"  class="form-control input-default the-rest"   placeholder="0.00"  >
                                            
                                       </div>

                                       <div class="form-group col-md-3 d-flex align-items-end">
                                         <a type="button " class="btn btn-secondary " id="calculate-amount">Calculer</a>
                                       </div>--}}
                                       <div class="form-group col-md-4">
                                        <label>N° de bon:</label>
                                        <input type="text"  class="form-control input-default" minlength="6" maxlength="6" value="" name="n_bon" placeholder="0" required >
                                        
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
         course_id = $('#select-course').val();
         edition_id = $('#select-edition').val();
         student_id = $('#select-student').val();
         price = $("input[name='check']:checked").val();
         $.ajax({
			url: '/get-rest-amount/'+course_id +'/'+edition_id+'/'+student_id +'/'+amount +'/'+price,
			type: "GET",

			success: function (res) {
               $(".the-rest").val(res);
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
                    
				data = data + '<option value="'+ res.user.id+ '" >'+ res.user.name+ ' - ' +res.user.date_birth+ '</option>';
				}); 
				$('#select-student').html(data);
				$('#select-student').selectpicker('refresh');
				$('#select-student').selectpicker('refresh');

			}
		});

	});
</script>
@endpush
