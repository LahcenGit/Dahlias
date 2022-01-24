<?php $dash.='--'; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr id= "{{$subcategory->id}}">
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->name}}</td>
        <td>{{$subcategory->created_at}}</td>
        <td>{{$subcategory->parent->name}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('dashboard-admin/category/'.$subcategory->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                <button data-id = "{{$subcategory->id}}" class=" delete-category btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
            </div>												
        </td>	
    </tr>
    @if(count($subcategory->childCategories))
        @include('sub-category-list',['subcategories' => $subcategory->childCategories])
    @endif
@endforeach