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
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Une Formation</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <form action="{{url('dashboard-admin/courses/'.$course->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                                @csrf
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
                                               
                                                <option value="{{$category->id}}" @if ($course->category_id == $category->id ) selected @endif >{{$category->name}}</option>
                                                @foreach($category->childCategories as $sub)
                                               
                                                <option  value="{{$sub->id}}" @if ($course->category_id == $sub->id ) selected @endif> &nbsp &nbsp{{$sub->name}}</option>
                                                @foreach($sub->childCategories as $subsub)
                                                    <option value="{{$subsub->id}}"  @if ($course->category_id == $subsub->id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->name}}</option>
                                               
    
                                                @foreach($subsub->childCategories as $subsubsub)
                                                <option value="{{$subsubsub->id}}"  @if ($course->category_id == $subsubsub->id  ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->name}}</option>
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
                                        <select class="form-control  @error('instructor') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="instructor" required>
                                       
                                            
                                          
                                                @foreach($instructors as $instructor)
                                               
                                                <option value="{{$instructor->id}}" @if ($course->instructor_id == $instructor->id ) selected @endif >{{$instructor->name}}</option>
                              
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
                                        <select class="form-control  @error('language') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="language"required>
                                           
                                            <option value="arabe"  @if ($course->language == "arabe" ) selected @endif >Arabe</option>
                                            <option value="francais" @if ($course->language == "francais" ) selected @endif >Francais</option>
                                            <option value="anglais" @if ($course->language == "anglais" ) selected @endif >Anglais</option>
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
                                            
                                            <option value="debutant" @if ($course->level == "debutant" ) selected @endif >Débutant</option>
                                            <option value="intermediare" @if ($course->level == "i" ) selected @endif>Intermédiare</option>
                                            <option value="avance" @if ($course->level == "avance" ) selected @endif>Avancé</option>
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
                                       
                                        <option value="lancee" @if ($course->status == "lancee" ) selected @endif>Lancée</option>
                                        <option value="prochainement" @if ($course->status == "prochaainement" ) selected @endif>Prochainement</option>
                                       
                                    </select>
                                </div>
                           
                           
                                <div class="form-group col-md-6">
                                    <label>Certifié* :</label>
                                    <select class="form-control  @error('certificate') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="certificate" required>
                                       
                                        <option value="oui" @if ($course->certificate == "oui" ) selected @endif>Oui</option>
                                        <option value="non" @if ($course->certificate == "non" ) selected @endif>Non</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                              
                                
                                
                                <div class="form-group col-md-3">
                                    <label>Nombre d'étudiants(optionnel) :</label>
                                    <input type="number"  class="form-control input-default @error('nbr_student') is-invalid @enderror" value="{{$course->nbr_student}}" name="nbr_student"  placeholder="0" >
                                    @error('nbr_student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Prix* :</label>
                                    <input type="text"  class="form-control input-default @error('price') is-invalid @enderror" value="{{$course->price}}" name="price"  placeholder="0" >
                                    @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Photos* :</label>
                                  
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="photos[]" multiple>
                                        <label class="custom-file-label">Choose file</label>

                                       
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
                        <button type="submit"  class="btn btn-primary mt-3">Modifier</button>
                   </div>
                </div>
            </div>
             </form>
        </div>
    </div>
</div>   
    
@endsection