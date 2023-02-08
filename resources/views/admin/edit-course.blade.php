@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue !</h4>
                    <span>Modifier Formation</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">ModifierFormation</a></li>
                </ol>
            </div>
        </div>

        <form action="{{url('dashboard-admin/courses/'.$course->id)}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Une Formation</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                           
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value=" {{$course->name}} "name="name" placeholder="name" >
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>La durée* :</label>
                                        <input type="text"  class="form-control input-default @error('duration') is-invalid @enderror" value=" {{$course->duration}}" name="duration"  placeholder="duree" >
                                        @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label>Categories* :</label>
                                        <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category" required>
                                       
                                            
                                          
                                                @foreach($categories as $category)
                                               
                                                <option value="{{$category->id}}" @if ($course->categorie_id == $category->id ) selected @endif >{{$category->name}}</option>
                                                @foreach($category->childCategories as $sub)
                                               
                                                <option  value="{{$sub->id}}" @if ($course->categorie_id == $sub->id ) selected @endif> &nbsp &nbsp{{$sub->name}}</option>
                                                @foreach($sub->childCategories as $subsub)
                                                    <option value="{{$subsub->id}}"  @if ($course->categorie_id == $subsub->id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->name}}</option>
                                               
    
                                                @foreach($subsub->childCategories as $subsubsub)
                                                <option value="{{$subsubsub->id}}"  @if ($course->categorie_id == $subsubsub->id  ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->name}}</option>
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
                                        <label>Formateurs* :</label>
                                        <select multiple class="form-control  @error('instructor') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="instructors[]" required>
                                       
                                            
                                          
                                                @foreach($instructors as $instructor)
                                               
                                                <option value="{{$instructor->id}}" @foreach($courseinstructors as $courseinstructor) @if ($courseinstructor->instructor_id == $instructor->id ) selected @endif @endforeach >{{$instructor->name}}</option>
                              
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
                                        <label>La langue* :</label>
                                        <select multiple class="form-control  @error('language') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="languages[]"required>
                                           
                                            @foreach($languages as $language)
                                               
                                            <option value="{{$language->id}}" @foreach($courselanguages as $courselanguage) @if ($courselanguage->language_id == $language->id) selected @endif @endforeach >{{$language->language}}</option>
                          
                                            @endforeach
                                            
                                            @error('language')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Niveau* :</label>
                                        <select class="form-control  @error('level') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="level" required>
                                            
                                            <option value="Debutant" @if ($course->level == "Debutant" ) selected @endif >Débutant</option>
                                            <option value="Intermediare" @if ($course->level == "Intermediare" ) selected @endif>Intermédiare</option>
                                            <option value="Avance" @if ($course->level == "Avance" ) selected @endif>Avancé</option>
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
                                    <label>Date Debut(optionnel) :</label>
                                    <input type="date"  class="form-control input-default @error('start_date') is-invalid @enderror" value="{{$course->start_date}}" name="start_date" >
                                    @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Date Fin(optionnel) :</label>
                                    <input type="date"  class="form-control input-default @error('end_date') is-invalid @enderror" value="{{$course->end_date}}" name="end_date" >
                                    @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                               
                            </div>

                            
                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Statut* :</label>
                                    <select class="form-control  @error('status') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="status" required>
                                       
                                        <option value="Lancee" @if ($course->status == "Lancee" ) selected @endif>Lancée</option>
                                        <option value="Prochainement" @if ($course->status == "Prochainement" ) selected @endif>Prochainement</option>
                                       
                                    </select>
                                </div>
                           
                           
                                <div class="form-group col-md-6">
                                    <label>Certifié* :</label>
                                    <select class="form-control  @error('certificate') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="certificate" required>
                                       
                                        <option value="Attestation" @if ($course->certificate == "Attestation" ) selected @endif>Attestation</option>
                                        <option value="Certificat" @if ($course->certificate == "Certificat" ) selected @endif>Certificat</option>
                                        <option value="Diplome" @if ($course->certificate == "Diplome" ) selected @endif>Diplôme</option>
                                        <option value="Indisponible" @if ($course->certificate == "Indisponible" ) selected @endif>Indisponible</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                               <div class="form-group col-md-6">
                                    <label>Nombre d'étudiants(optionnel) :</label>
                                    <input type="number"  class="form-control input-default @error('nbr_student') is-invalid @enderror" value="{{$course->nbr_student}}" name="nbr_student"  placeholder="0" >
                                    @error('nbr_student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Filière (optionnel) :</label>
                                    <input type="text"  class="form-control input-default @error('filiere') is-invalid @enderror" value="{{$course->filiere}} "name="filiere" placeholder="filiere" >
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
                                            <label class="radio-inline mr-3"><input type="radio" name="check" value="oui" @if($course->check == 'oui') checked @endif> Oui</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="check" value="non" @if($course->check == 'non') checked @endif> Non</label>
                                        </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Photos * :</label>
                                    <div class="basic-form custom_file_input">
                                        <div class="input-group mb-3">
                                            <input type="file" multiple name="photos[]" accept="image/*" >
                                            <img src="{{asset('storage/'.$course->images[0]->lien)}}" width="243px " height="126px">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Prix * :</label>
                                    <input type="text"  class="form-control input-default @error('price') is-invalid @enderror" value="{{$course->price}}" name="price"  placeholder="0" required >
                                    @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label>Ancien Prix * :</label>
                                    <input type="text"  class="form-control input-default @error('old_price') is-invalid @enderror" value="{{$course->old_price}}" name="old_price"  placeholder="0" >
                                    @error('old_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                 
                             <div class="form-group col-md-3">
                                    <label>Duration * :</label>
                                    <input type="text"  class="form-control input-default @error('slug') is-invalid @enderror" value="{{$course->slug}}" name="slug"   required >
                                    @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                            
                                <div class="form-group col-md-3">
                                    <label>Nombre de séance * :</label>
                                    <input type="text"  class="form-control input-default @error('flug') is-invalid @enderror" value="{{$course->flug}}" name="nbr_session" required >
                                    @error('flug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Document (optionnel):</label>
                                    <input type="file"  class="form-control input-default @error('file') is-invalid @enderror" value="{{$course->file}}" name="file">
                                    @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Lien youtub (optionnel) :</label>
                                    <input type="text"  class="form-control input-default @error('youtub_link') is-invalid @enderror" value="{{$course->youtub_link}}" name="youtub_link">
                                    @error('youtub_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                                Description* : </h4>
                    </div>
                    <div class="card-body">
                        <textarea class="summernote" class="form-control input-default @error('description') is-invalid @enderror"  name="description" id="">{{$course->description}}</textarea>
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
                        <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                   </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>   


<form action="" method="post">


</form>
    
@endsection