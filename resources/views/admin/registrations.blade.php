@extends('layouts.dashboard-admin')
@section('content')



<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Inscriptions</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Les inscriptions</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table des prés-inscriptions</h4>
                        <button type="button" id="add-registration" class="btn btn-primary mt-3">Ajouter</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Formation</th>
                                        <th>Name</th>
                                
                                        <th>Téléphone</th>
                                        <th>Date de naissance</th>
                                        <th>Date</th>
                                        <th>Accepter</th>
                                        <th>Remarque</th>
                                        <th>Statut</th>
                                        <th>Nombre d'appels et sms</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $registration)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$registration->course->name}}</td>
                                        <td><strong>{{$registration->name}}</strong></td>
                                        <td><strong>{{$registration->phone}} </strong></td>
                                        <td><strong>{{$registration->age}}  </strong></td>
                                        <td><strong>{{$registration->created_at}} </strong></td>
                                        @if($registration->accept)
                                        <td><strong>{{$registration->accept}} </strong></td>
                                        @else
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @endif
                                        @if($registration->remarque != Null)
                                        <td><strong>{{$registration->remarque}} </strong></td>
                                        @else
                                        <td><strong><i class="fa fa-minus"></i></strong></td>
                                        @endif
                                        @if ($registration->status == 1 )
                                        <td><span class="badge badge-warning">En Attente</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @elseif($registration->status == 2)
                                        <td><span class="badge badge-light">Va passer</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @elseif($registration->status == 3)
                                        <td><span class="badge badge-info">Interessé(e)</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @elseif($registration->status == 4)
                                        <td><span class="badge badge-dark">Injoignable</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @elseif($registration->status == 5)
                                        <td><span class="badge badge-secondary">Appels + sms</span></td>
                                        <td><strong>{{$registration->remark}} </strong></td>
                                         @elseif($registration->status == 6)
                                        <td><span class="badge badge-success">Validé</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @else
                                        <td><span class="badge badge-danger">Annuler</span></td>
                                        <td><strong><i class="fa fa-minus"></i> </strong></td>
                                        @endif
                                       
                                        <td>
                                             <div class="d-flex">
                                                @if($registration->status == 6)
                                                <button class=" btn btn-primary shadow btn-xs sharp mr-1 add-final-registration" data-id="{{$registration->id}}"><i class="fa fa-plus"></i></button>
                                                @endif
                                                <form action="{{url('dashboard-admin/registrations/'.$registration->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <a href="{{url('dashboard-admin/registrations/'.$registration->id.'/edit')}}"  class="btn btn-secondary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <button   class=" btn btn-danger shadow btn-xs sharp mr-1"onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                            </div>	
                                            </form>											
                                        </td>												
                                    </tr>
                                   
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
</div>
</div>
<div id="modal-registration">

</div>
<div id="modal-final-registration">

</div>
@endsection

@push('modal-add-registration-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#add-registration").click(function() {
  
 $.ajax({
    url: '/add-registration' ,
    type: "GET",
    success: function (res) {
      $('#modal-registration').html(res);
      $('#modal-registration').find("#course").selectpicker();
      $("#exampleModal").modal('show');
    }
  });
  
});



</script>
@endpush

@push('modal-add-final-registration-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("body").on('click','.add-final-registration',function() {

  var id = $(this).data('id');
  
  $.ajax({
      url: '/add-final-registration/'+id ,
      type: "GET",
      success: function (res) {
        $('#modal-final-registration').html(res);
        $('#modal-final-registration').find("#student").selectpicker();
        $('#modal-final-registration').find("#edition").selectpicker();
        $('#modal-final-registration').find("#address").selectpicker();
        $("#exampleModal2").modal('show');
      }
    });
  
});



</script>
@endpush
@push('submite-registration-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

  $("#modal-final-registration").on('click','#submitFinalRegistration',function(e){
       
        e.preventDefault();
        if($('#is-checked').is(':checked')){
          let student = null;
          let edition = $('#edition').val();
          let name = $('#name').val();
          let phone = $('#phone').val();
          let email = $('#email').val();
          let date_birth = $('#date_birth').val();
          let address = $('#address').val();
          let sexeTest = $("input[name='sexe']:checked").val();
          let sexe = sexeTest;
          $.ajax({
              type:"POST",  
              url: "/final-registration",
              data:{
                "_token": "{{ csrf_token() }}",
                student:student,
                edition:edition,
                name:name,
                phone:phone,
                email:email,
                date_birth:date_birth,
                address:address,
                sexe:sexe,
                
              },
              success:function(res){
               if(res == false){
                   $("#alert").css("display", "block");
                }
                else{
                  $('#exampleModal2').modal('hide'); 
                  window.location.replace('/dashboard-admin/final-registrations');
                }
              },
            });
          }
          
        else{
          let student = $('#student').val();
          let edition = $('#edition').val();
          let name = null;
          let phone =null;
          let email = null;
          let date_birth = null;
          let address = null;
          let sexe = null;
          $.ajax({
            type:"POST",  
            url: "/final-registration",
            data:{
              "_token": "{{ csrf_token() }}",
              student:student,
              edition:edition,
              name:name,
              phone:phone,
              email:email,
              date_birth:date_birth,
              address:address,
              sexe:sexe,
              
            },
            success:function(res){
              $('#exampleModal2').modal('hide'); 
              window.location.replace('/dashboard-admin/final-registrations');
              
            },
          });
        }
      
  });
</script>   
 @endpush
@push('form-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

  $("#modal-registration").on('click','#submitF',function(e){
   
        e.preventDefault();
        let name = $('#name').val();
        let telephone = $('#numero').val();
        let email = $('#email').val();
        let course = $('#course').val();
        let age = $('#age').val();
        let acceptOui = $('#acceptOui').val();
        let acceptNon = $('#acceptNon').val();
        
      
        $.ajax({
          
          type:"POST",  
          url: "/registration",
          data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            email:email,
            telephone:telephone,
            course:course,
            age:age,
            acceptOui:acceptOui,
            acceptNon:acceptNon
           },
        
          success:function(response){
           
            $('#exampleModal').modal('hide'); 
            
            console.log(response);
            location.reload(); 
          },
          error: function(response) {
           
            $('#modal-registration').find('#nameError').text(response.responseJSON.errors.name);
            $('#modal-registration').find('#telephoneError').text(response.responseJSON.errors.telephone);
            $('#modal-registration').find('#courseError').text(response.responseJSON.errors.course);
            $('#modal-registration').find('#ageError').text(response.responseJSON.errors.age);
            $( ".invalid" ).addClass( "is-invalid" );
            $('#modal-registration').find('.invalid-feedback').show();
          },
          });
       
   });
</script>   
 @endpush
@push('show-input-add-student-scripts')
<script>

   $("#modal-final-registration").on('change','#is-checked',function(){
    
    if(this.checked) {
        $("#check").css("display", "block");
         $("#select-student").css("display", "none");
    }
    else{
        $("#check").css("display", "none");
        $("#select-student").css("display", "block");
       }
    });

 </script>
@endpush