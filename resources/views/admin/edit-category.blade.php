@extends('layouts.dashboard-admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Edit Category</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard-admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Categorie</a></li>
                </ol>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Categorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('dashboard-admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                
                                @csrf
                                <div class="form-group">
                                    <label>Category name:</label>
                                    <input type="text"  class="form-control input-default @error('name') is-invalid @enderror" value="{{$category->name}}"  name="name" placeholder="name">
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    
                                    <label>Categories List :</label>
                                    
                                    <select class="form-control  @error('category') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="category">
                                       
                                            <option value="0">Nothing selected</option>
                                      
                                            @foreach($categories as $cat)
                                           
                                            <option value="{{$cat->id}}" @if ( $cat->id == $category->parent_id  ) selected @endif>{{$cat->name}}</option>
                                            @foreach($cat->childCategories as $sub)
                                           
                                            <option  value="{{$sub->id}}" @if ( $sub->id ==  $category->parent_id  ) selected @endif> &nbsp &nbsp{{$sub->name}}</option>

                                            @foreach($sub->childCategories as $subsub)
                                                <option value="{{$subsub->id}}" @if ( $subsub->id ==  $category->parent_id ) selected @endif>  &nbsp  &nbsp  &nbsp &nbsp{{$subsub->name}}</option>
                                           

                                            @foreach($subsub->childCategories as $subsubsub)
                                            <option value="{{$subsubsub->id}}"  @if ( $subsubsub->id ==  $category->parent_id  ) selected @endif>  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp{{$subsubsub->name}}</option>
                                            @endforeach 
                                            @endforeach 
                                            @endforeach 
                                            @endforeach
  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Description : </label>
                                    <textarea class="form-control" name="description" rows="3">{{$category->description}}</textarea>
                                </div>

                                <button type="submit"  class="btn btn-primary mt-3">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection