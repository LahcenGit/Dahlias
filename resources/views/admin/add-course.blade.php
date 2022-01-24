@extends('layouts.dashboard-admin')
@section('content')

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
                                        <label>Name* :</label>
                                        <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value=" {{old('name')}} "name="name" placeholder="name" >
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>La durée* :</label>
                                        <input type="text"  class="form-control input-default @error('duration') is-invalid @enderror" value=" {{old('duration')}}" name="duration"  placeholder="duree" >
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
                                        <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category">
                                       
                                            <option value=0>Nothing selected</option>
                                          
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
                                        <label>Formateurs* :</label>
                                        <select class="form-control  @error('instructor') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="instructor">
                                       
                                            <option value=0>Nothing selected</option>
                                          
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
                                        <label>La langue* :</label>
                                        <select class="form-control  @error('language') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="language">
                                            <option value=0>Nothing selected</option>
                                            <option value="arabe"  @if (old('language') == "arabe" ) selected @endif >Arabe</option>
                                            <option value="francais" @if (old('language') == "francais" ) selected @endif >Francais</option>
                                            <option value="anglais" @if (old('language') == "anglais" ) selected @endif >Anglais</option>
                                            @error('language')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Niveau* :</label>
                                        <select class="form-control  @error('level') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="level">
                                            <option value=0>Nothing selected</option>
                                            <option value="debutant" @if (old('level') == "debutant" ) selected @endif >Débutant</option>
                                            <option value="intermediare" @if (old('level') == "i" ) selected @endif>Intermédiare</option>
                                            <option value="avance" @if (old('level') == "avance" ) selected @endif>Avancé</option>
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
                                    <input type="date"  class="form-control input-default @error('start_date') is-invalid @enderror" value=" {{old('start_date')}} "name="start_date" >
                                    @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Date Fin(optionnel) :</label>
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
                                    <label>Statut* :</label>
                                    <select class="form-control  @error('status') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="status">
                                        <option value=0>Nothing selected</option>
                                        <option value="lancee" @if (old('status') == "l" ) selected @endif>Lancée</option>
                                        <option value="prochainement" @if (old('status') == "p" ) selected @endif>Prochainement</option>
                                       
                                    </select>
                                </div>
                           
                           
                                <div class="form-group col-md-6">
                                    <label>Certifié* :</label>
                                    <select class="form-control  @error('certificate') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="certificate">
                                        <option value=0>Nothing selected</option>
                                        <option value="oui" @if (old('status') == "oui" ) selected @endif>Oui</option>
                                        <option value="non" @if (old('status') == "non" ) selected @endif>Non</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                              
                                
                                
                                <div class="form-group col-md-3">
                                    <label>Nombre d'étudiants(optionnel) :</label>
                                    <input type="number"  class="form-control input-default @error('nbr_student') is-invalid @enderror" value="{{old('nbr_student')}}" name="nbr_student"  placeholder="0" >
                                    @error('nbr_student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Prix* :</label>
                                    <input type="text"  class="form-control input-default @error('price') is-invalid @enderror" value="{{old('price')}}" name="price"  placeholder="0" >
                                    @error('price')
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
           
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                             Description* : </h4>
                    </div>
                    <div class="card-body">
                        <textarea class="summernote" class="form-control input-default @error('description') is-invalid @enderror"  name="description" id="">{{old('description')}}</textarea>
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
                        <button type="submit" style="background-color:#16B4B7;border-color:#16B4B7;" class="btn btn-primary mt-3">Ajouter</button>
                   </div>
                </div>
            </div>
             </form>
        </div>
    </div>
</div>   
    
@endsection