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
        <div id="show_alert">
            
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
                            <table id="example3" class="display" >
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Formation</th>
                                        <th>Nom complet</th>
                                        <th>Téléphone</th>
                                        <th>date naiss.</th>
                                        <th>Cause</th>
                                        <th>remarque</th>
                                        <th>date</th>
                                        <th>Statut</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $registration)
                                    <tr id="tr-{{$registration->id}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$registration->course->name}}</td>
                                        <td id="td-name-{{$registration->id}}"><strong>{{$registration->name}}</strong></td>
                                        <td id="td-phone-{{$registration->id}}"><strong>{{$registration->phone}} </strong></td>
                                        <td id="td-age-{{$registration->id}}"><strong>{{$registration->age}}</strong></td>
                                        <td id="td-cause-{{$registration->id}}"><strong>{{$registration->cause}}</strong></td>
                                        <td id="td-remarque-{{$registration->id}}"><strong>{{$registration->remarque}}</strong></td>
                                        <td><strong>{{$registration->created_at->format('d-m-Y')}}</strong></td>
                                       
                                       
                                        
                                        @if ($registration->status == 1 )
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-warning">En Attente</span></td>
                                        @elseif($registration->status == 2)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-light">Va passer</span></td>
                                        @elseif($registration->status == 3)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-info">Interessé(e)</span></td>
                                        @elseif($registration->status == 4)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-dark">Injoignable</span></td>
                                        @elseif($registration->status == 5)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-secondary">Appels + sms</span></td>
                                        @elseif($registration->status == 6)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-success">Validé</span></td>
                                        @elseif($registration->status == 7)
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-danger">Annuler</span></td>
                                        @else
                                        <td id="td-status-{{$registration->id}}"><span class="badge badge-primary">Prochaine session</span></td>
                                        @endif
                                       <td>
                                             <div class="d-flex">
                                                @if($registration->status == 6)
                                                 @if($registration->flag != 1)
                                                <button class=" btn btn-primary shadow btn-xs sharp mr-1 add-final-registration" data-id="{{$registration->id}}"><i class="fa fa-plus"></i></button>
                                                 @endif
                                                @endif
                                                 <button data-id="{{$registration->id}}"  class="btn btn-secondary shadow btn-xs sharp mr-1 edit-status"><i class="fa fa-pencil"></i></button>
                                                <form action="{{url('dashboard-admin/registrations/'.$registration->id)}}" method="post">
                                                
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                               
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
<div id="modal-edit-status">

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

@push('modal-edit-status-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("body").on('click','.edit-status',function() {
  var id = $(this).data('id');

 $.ajax({
    
    url: '/edit-status/'+id ,
    type: "GET",
    success: function (res) {
      $('#modal-edit-status').html(res);
      $('#modal-edit-status').find("#status").selectpicker();
      $("#exampleModal3").modal('show');
    }
  });
  
});
</script>
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

  $("#modal-edit-status").on('click','#save-status',function(e){
   
        e.preventDefault();
        let status = $('#status').val();
         let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let age = $('#age').val();
        let place_birth = $('#place_birth').val();
        let fonction = $('#fonction').val();
        let genre = $("input[name='genre']:checked").val();
        let remarque = $('#remarque').val();
        let accept =  $("input[name='accept']:checked").val();
        let remark = $('#remark').val();
        let cause = $('#cause').val();
        let id =  $('#registration').val();
       
        
        $.ajax({
          
          type:"POST",  
          url: "/update-registration/"+id,
          data:{
            "_token": "{{ csrf_token() }}",
            status:status,
            name:name,
            email:email,
            phone:phone,
            age:age,
            place_birth:place_birth,
            fonction:fonction,
            genre:genre,
            remarque:remarque,
            accept:accept,
            cause:cause,
            remark:remark,
            
           },
        
          success:function(response){
           $('#exampleModal3').modal('hide'); 
           toastr.success("Statut modifié avec succès", "Succès", {
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1

            })
         if(status == 1){
              $("#td-status-"+id).html('<span class="badge badge-warning">'+'En Attente'+'</span>');
            }
             else if(status == 2){
              $("#td-status-"+id).html('<span class="badge badge-light">'+'Va passer'+'</span>');
            }
             else if(status == 3){
              $("#td-status-"+id).html('<span class="badge badge-info">'+'Interessé(e)'+'</span>');
            }
             else if(status == 4){
              $("#td-status-"+id).html('<span class="badge badge-dark">'+'Injoignable'+'</span>');
            }
             else if(status == 5){
              $("#td-status-"+id).html('<span class="badge badge-secondary">'+'Appels + sms'+'</span>');
            }
             else if(status == 6){
              $("#td-status-"+id).html('<span class="badge badge-success">'+'Validé'+'</span>');
            }
            else if(status == 7){
              $("#td-status-"+id).html('<span class="badge badge-danger">'+'Annuler'+'</span>');
            }
            else{
              $("#td-status-"+id).html('<span class="badge badge-primary">'+'Prochaine session'+'</span>');
            }
              $("#td-name-"+id).html(name);
              $("#td-phone-"+id).html(phone);
              $("#td-age-"+id).html(age);
              $("#td-remarque-"+id).html(remarque);
              $("#td-cause-"+id).html(cause);
          },
          
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
          let id = $('#id').val();
          
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
                 id:id,
                
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
          let id = $('#id').val();
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
              id:id,
              
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