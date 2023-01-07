@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Modifier Versement</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Versement</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier versement</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/payments/'.$payment->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label>Formation* :</label>
                                            <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="course" id="select-course">
                                            <option>Nothing Selected</option>
                                            @foreach($courses as $c)
                                            <option value="{{$c->id}}" @if($course->id == $c->id )selected @endif>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Edition* :</label>
                                            <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" name="edition" id="select-edition" required>
                                                @foreach($editions as $edition)
                                                <option value="{{$edition->id}}" @if($edition->id == $payment->group_id) selected @endif>{{$edition->group}}</option>
                                                @endforeach
                                        </select>
                                            
                                       </div>
                                       <div class="form-group col-md-4">
                                        <label>Etudiant* :</label>
                                        <select type="text"  class="form-control invalid"  class="selectpicker" id="select-student"  data-live-search="true" name="student"  required>
                                                @foreach($students as $student)
                                                <option value="{{$student->student->id}}">{{$student->student->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>         
                               
                               
                                <div class="form-row">
                                       <div class="form-group col-md-4">
                                            <label>Montant:</label>
                                            <input type="text"  class="form-control input-default" value="{{$payment->amount}}" id="amount" name="amount" placeholder="0.00" required>
                                            
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label>Le reste:</label>
                                            <input type="text"  class="form-control input-default the-rest"   placeholder="0.00" required >
                                            
                                       </div>

                                       <div class="form-group col-md-3 d-flex align-items-end">
                                         <a type="button " class="btn btn-secondary " id="calculate-amount">Calculer</a>
                                       </div>
                                </div> 
                               
                                <div class="form-row">
                                       <div class="form-group col-md-4">
                                            <label>N° de bon:</label>
                                            <input type="text"  class="form-control input-default" value="{{$payment->N_bon}}" name="n_bon" placeholder="0" required >
                                            
                                       </div>
                                </div>                           
                                <button type="submit" class="btn btn-primary mt-3 text-center" >Enregistrer</button>
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
