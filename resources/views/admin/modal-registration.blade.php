<div class="modal fade" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter Une Pré Inscription</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="sbmitF">
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                       
                
                     <div class="form-row">
                      <div class="form-group col-md-12">
                            <label>Formation: :</label>
                            <select  class="form-control" class="selectpicker"  data-live-search="true" name="course" id="course" >
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}" >{{$course->name}}</option>
                                    <span class="invalid-feedback" id="courseError" role="alert">
                                    </span>
                                    @endforeach
                            </select>
                      </div>
                     </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Nom Et prénom*:</label>
                                <input type="text"  class="form-control invalid" id="name"  placeholder="name">
                               
                                    <span class="invalid-feedback" id="nameError" role="alert">
                                    </span>
                               
                            </div>
    
                            <div class="form-group col-md-6">
                                <label> Téléphone*:</label>
                                <input type="text"  class="form-control invalid"  id="numero"  placeholder="xx xx xx xx xx">
                               
                                  <span class="invalid-feedback" id="telephoneError" role="alert"></span>
                       
                            </div>
                    </div>
    
                     <div class="form-row">
                             <div class="form-group col-md-6">
                                <label> Email(optionnel):</label>
                                <input type="text"  class="form-control  " id="email" placeholder="mohamed@gmail.com">
                                  
                                    <span class="invalid-feedback" id="emailError" role="alert"></span>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                <label> Date de naissance*:</label>
                                <input type="date"  class="form-control  " id="age" placeholder="20">
                                  
                                    <span class="invalid-feedback" id="ageError" role="alert"></span>
                                    
                                </div>
                     </div>
                     <div class="form-row">
                             <div class="form-group col-md-12">
                                <label> Remarque:</label>
                                <input type="text"  class="form-control" id="remarque" placeholder="...">
                                  
                                    <span class="invalid-feedback" id="remarqueError" role="alert"></span>
                                    
                                </div>
                                
                     </div>
                   
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="button" id="submitF" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>