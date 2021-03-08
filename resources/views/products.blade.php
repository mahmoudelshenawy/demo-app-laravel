@extends('app')

@section('content')
<h3 class="my-3">Filter products</h3>
<div class="row my-4">
    <div class="col-md-3">
        <div class="form-group">
            <div id="for-name" >
            <input type="text" class="form-control"  placeholder="search by name, desc,tags or categories" id="search">
        </div>
    </div>
</div>
    <div class="col-md-3">
        <select  class="custom-select" id="filterCategory"
        >
            <option value="all">All</option>
            @foreach ($categories as $cat)
            <option value="{{$cat->name}}" data-cat="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select  class="custom-select" id="filterSubCategory" name="subCategory"
        >
            <option value="all">SubCategory</option>
         
        </select>
    </div>
    <div class="col-md-3">
        <select  class="custom-select" id="filterTags" name="tags"
        >
            <option value="all">All</option>
            @foreach ($tags as $tag)
            <option value="{{$tag->name}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">
    <div class="d-flex justify-content-between ">
        <h3>
            Manage Products
        </h3>
<div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#AddEditProduct" data-whatever="@getbootstrap" >Add New Product</button>
</div>
    </div>
    </div>
<table class="table table-striped table-hover table-dark" id="products_table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">image</th>
        <th scope="col">Desc</th>
        <th scope="col">Category</th>
        <th scope="col">Sub category</th>
        <th scope="col">Tags</th>
        
      </tr>
    </thead>
   
</table>
</div>
@include('partials.add_modal')
@include('partials.scripts')
@endsection