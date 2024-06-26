<div class="modal fade" id="exampleModal3">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le statut</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="sbmitF">
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                       <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label>Nom :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->name}}" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->email}}" id="email">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label>Téléphone :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->phone}}" id="phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date de naissance :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->age}}" id="age">
                            </div>
                        </div>
                      
                         <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label>Lieu de naissance :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->place_birth}}" id="place_birth">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fonction :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->function}}" id="fonction">
                            </div>
                        </div>
                         <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label>Cause d'inscription :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->cause}}" id="cause">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label>Remarque :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->remarque}}" id="remarque">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label>Genre :</label>
                                 <div class="form-group mb-0">
                                        <label class="radio-inline mr-3"><input type="radio"  value="Homme" @if($registration->sexe == "Homme")checked @endif name="genre"> Homme</label>
                                        <label class="radio-inline mr-3"><input type="radio"  value="Femme" @if($registration->sexe == "Femme")checked @endif name="genre"> Femme</label>
                                 </div>
                            </div>
                        </div>
                         <div class="form-row ">
                          <div class="form-group col-md-12">
                            <label>Statut :</label>
                               <select class="form-control" id="status"  class="selectpicker" data-live-search="true" name="status" >
                                <option value="1" @if ($registration->status == 1 ) selected @endif>En Attente</option>
                                <option value="2" @if ($registration->status == 2 ) selected @endif>Va passer</option>
                                <option value="3" @if ($registration->status == 3 ) selected @endif>Intéressé</option>
                                <option value="4" @if ($registration->status == 4 ) selected @endif>Injoignable</option>
                                <option value="5" @if ($registration->status == 5 ) selected @endif>Appel + sms</option>
                                <option value="8" @if ($registration->status == 8 ) selected @endif>Prochaine session</option>
                                <option value="6" @if ($registration->status == 6 ) selected @endif>Validé</option>
                                <option value="7" @if ($registration->status == 7 ) selected @endif>Annuler</option>
                                </select>
                            </div>
                            <input type="hidden" value="{{$registration->id}}" id="registration">
                        </div>
                        @if($registration->status == 5 )
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label>Remarque :</label>
                                <input type="text" class="form-control input-default"  value="{{$registration->remark}}" id="remark">
                            </div>
                        </div>
                        @endif
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="button" id="save-status" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

