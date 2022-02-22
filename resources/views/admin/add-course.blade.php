@extends('layouts.dashboard-admin')
@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Ajouter Formation</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter Formation</a></li>
                </ol>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter Une Formation</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('/dashboard-admin/courses')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nom de la formation* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value=" {{old('name')}} "name="name" placeholder="name" required>
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>La durée (Par Heure) * :</label>
                                        <input type="text"  class="form-control input-default @error('duration') is-invalid @enderror" value=" {{old('duration')}}" name="duration"  placeholder="durée" required >
                                        @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Catégories* :</label>
                                        <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category" required>
                                       
                                            
                                          
                                                @foreach($categories as $category)
                                               
                                                <option value="{{$category->id}}" @if (old('category') == $category->id ) selected @endif >{{$category->name}}</option>
                                                @foreach($category->childCategories as $sub)
                                               
                                                <option  value="{{$sub->id}}" @if (old('category') == $sub->id ) selected @endif> &nbsp &nbsp{{$sub->name}}</option>
                                                @foreach($sub->childCategories as $subsub)
                                                    <option value="{{$subsub->id}}"  @if (old('category') == $subsub->id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->name}}</option>
                                               
    
                                                @foreach($subsub->childCategories as $subsubsub)
                                                <option value="{{$subsubsub->id}}"  @if (old('category') == $subsubsub->id ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->name}}</option>
                                                @endforeach 
                                                @endforeach 
                                                @endforeach 
                                                @endforeach
                                                @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
      
                                        </select>
                                    </div>
                                         
                                    <div class="form-group col-md-6">
                                        <label>Formateur (optionnel) :</label>
                                        <select  multiple class="form-control  @error('instructor') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="instructors[]" >
                                       
                                            
                                          
                                                @foreach($instructors as $instructor)
                                               
                                                <option value="{{$instructor->id}}" @if (old('instructor') == $instructor->id ) selected @endif >{{$instructor->name}}</option>
                              
                                                @endforeach
                                                @error('instructor')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        </select>
                                    </div>
                                   
                                </div>
                             
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>La langue * :</label>
                                        <select  multiple class="form-control  @error('language') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="languages[]"required>
                                           
                                            @foreach($languages as $language)
                                               
                                            <option value="{{$language->id}}" @if (old('language') == $language->id ) selected @endif >{{$language->language}}</option>
                          
                                            @endforeach
                                            
                                            @error('language')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Niveau * :</label>
                                        <select class="form-control  @error('level') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="level" required>
                                            
                                            <option value="Débutant" @if (old('level') == "Débutant" ) selected @endif >Débutant</option>
                                            <option value="Intermédiare" @if (old('level') == "Intermédiare" ) selected @endif>Intermédiare</option>
                                            <option value="Avancé" @if (old('level') == "Avancé" ) selected @endif>Avancé</option>
                                            @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                        </select>
                                    </div>
                                </div>
                            

                            <div class="form-row">
                              
                                <div class="form-group col-md-6">
                                    <label>Date Début (optionnel) :</label>
                                    <input type="date"  class="form-control input-default @error('start_date') is-invalid @enderror" value=" {{old('start_date')}} "name="start_date" >
                                    @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Date Fin (optionnel) :</label>
                                    <input type="date"  class="form-control input-default @error('end_date') is-invalid @enderror" value="{{old('end_date')}}" name="end_date" >
                                    @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                               
                            </div>

                            
                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Statut * :</label>
                                    <select class="form-control  @error('status') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="status" required>
                                       
                                        <option value="Lancee" @if (old('status') == "Lancee" ) selected @endif>Lancée</option>
                                        <option value="Prochainement" @if (old('status') == "Prochainement" ) selected @endif>Prochainement</option>
                                       
                                    </select>
                                </div>
                           
                           
                                <div class="form-group col-md-6">
                                    <label>Certificat * :</label>
                                    <select class="form-control  @error('certificate') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="certificate" required>
                                       
                                        <option value="Attestation" @if (old('certificate') == "Attestation" ) selected @endif>Attestation</option>
                                        <option value="Certificat" @if (old('certificate') == "Certificat" ) selected @endif>Certificat</option>
                                        <option value="Diplome" @if (old('certificate') == "Diplôme" ) selected @endif>Diplôme</option>
                                        <option value="Indisponible" @if (old('certificate') == "Indisponible" ) selected @endif>Indisponible</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                              
                                
                                
                                <div class="form-group col-md-3">
                                    <label>Nombre d'étudiants (optionnel) :</label>
                                    <input type="number"  class="form-control input-default @error('nbr_student') is-invalid @enderror" value="{{old('nbr_student')}}" name="nbr_student"  placeholder="0" >
                                    @error('nbr_student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Prix * :</label>
                                    <input type="text"  class="form-control input-default @error('price') is-invalid @enderror" value="{{old('price')}}" name="price"  placeholder="0" required >
                                    @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Filière (optionnel) :</label>
                                    <input type="text"  class="form-control input-default @error('filiere') is-invalid @enderror" value=" {{old('filiere')}} "name="filiere" placeholder="filiere" >
                                    @error('filiere')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Visibilité du formateur :</label>
                                   
                                         
                                                <div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio" name="check" value="oui"> Oui</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="check" value="non"> Non</label>
                                                   
                                                </div>
                                           
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Photos * :</label>
                                  
                                    <div class="basic-form custom_file_input">
                                        <div class="input-group mb-3">
                                                <input type="file" multiple name="photos[]" accept="image/*" required>
                                                <input class="button-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                  
                    
                </div>
                
            </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                             Description * : </h4>
                    </div>
                    <div class="card-body">
                        <textarea class="summernote" class="form-control input-default @error('description') is-invalid @enderror"  name="description"  required>{{old('description')}}</textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                </div>
        </div>
            

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit"  class="btn btn-primary mt-3">Ajouter la Formation</button>
                   </div>
                </div>
            </div>
             </form>
        </div>
    </div>
</div>   
    
@endsection