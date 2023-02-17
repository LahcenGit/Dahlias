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
                        <div class="alert alert-danger" role="alert" id="alert" style="display:none;">
                        {{$registration->name}} existe déja.
                        </div>
                     <div class="form-row">
                        <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="is-checked" name="check" value=""> Un nouveau étudiant ?
                                </label>
                        </div>
                     </div>
                      <div id="check" style="display:none;">
                        <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                                <label>Nom et prénom* :</label>
                                <input type="text"  class="form-control invalid" id="name"   value="{{$registration->name}}">
                        </div>
                        <div class="form-group col-md-6">
                                <label>Téléphone* :</label>
                                <input type="text"  class="form-control invalid" id="phone"   value="{{$registration->phone}}">
                        </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                    <label>Date de naissance* :</label>
                                    <input type="date"  class="form-control invalid" id="date_birth"   value="{{$registration->age}}">
                            </div>
                            <div class="form-group col-md-6">
                            <label>Wilaya* :</label>
                                <select type="text"  class="form-control input-default" id="address" class="selectpicker" data-live-search="true" name="place_birth" required>
                                    @foreach($wilayas as $wilaya)
                                    <option value={{$wilaya->name}}@if($registration->place_birth == $wilaya->name) selected @endif>{{$wilaya->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                    <label>Email* :</label>
                                    <input type="text"  class="form-control invalid" id="email"   value="{{$registration->email}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Genre :</label>
                                    <div class="form-group mb-0">
                                        <label class="radio-inline mr-3"><input type="radio" name="sexe" value="Homme" @if($registration->sexe == 'Homme')checked @endif> Homme</label>
                                        <label class="radio-inline mr-3"><input type="radio" name="sexe" value="Femme" @if($registration->sexe == 'Femme')checked @endif> Femme</label>
                                        
                                    </div>
                            </div>
                        </div>
                     </div>
                     <div class="form-row mt-3">
                      <div class="form-group col-md-12">
                            <label>Formation :</label>
                            <input type="text"  class="form-control invalid" id="course"   value="{{$registration->course->name}}">
                      </div>
                     </div>
                    <div class="form-row" id="select-student" style="display:block;">
                            <div class="form-group col-md-12">
                                <label> Etudiant*:</label>
                                <select type="text"  class="form-control invalid"  class="selectpicker"  data-live-search="true" id="student" name="student" >
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}} - {{$student->date_birth}}</option>
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
                    <input type="hidden" value ="{{$registration->id}}" id="id">
                </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="button" id="submitFinalRegistration" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>

