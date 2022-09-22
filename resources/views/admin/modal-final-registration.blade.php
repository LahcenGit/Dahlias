<div class="modal fade" id="exampleModal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscription Finale</h5>
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
                            <input type="text"  class="form-control invalid" id="course"   value="{{$course->name}}">
                      </div>
                     </div>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Etudiant*:</label>
                                <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" id="student" name="student" >
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                    <span class="invalid-feedback" id="studentError" role="alert">
                                    </span>
                                    @endforeach
                                </select>
                            </div>
                     </div>
    
                     <div class="form-row">
                             <div class="form-group col-md-12">
                                <label> Edition:</label>
                                <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" id="edition"  placeholder="edition">
                                   @foreach($editions as $edition)
                                    <option value="{{$edition->id}}">{{$edition->group}}</option>
                                    <span class="invalid-feedback" id="editionError" role="alert">
                                    </span>
                                    @endforeach
                                </select>
                              </div>
                    </div>
                </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                <button type="button" id="submitFinalRegistration" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>