@extends('layouts.dashboard-admin')

<style>
.fontawesome {
    font-family: "Font Awesome 5 Free", "Font Awesome 5 Brands", sans-serif;
    font-weight: 900;
  }
</style>
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Ajouter Categorie</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard-admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter categorie</a></li>
                </ol>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter categorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('dashboard-admin/category')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category name:</label>
                                    <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="name">
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    
                                    <label>Categories List :</label>
                                    
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
  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Description : </label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                       
                                

                                <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection