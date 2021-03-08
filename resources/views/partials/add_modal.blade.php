{{-- Modal start --}}
<div class="modal fade" id="AddEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
              <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <p class="mg-b-10">title</p>
                        <div id="for-title" >
                        <input type="text" class="form-control"  placeholder="product title" name="name" value="{{old('name')}}">
                    </div>
                    <x-error name="name"/>
                    </div>
                   </div>
                   <div class="col-sm-4">
                    <div class="form-group">
                        <p class="mg-b-10">description</p>
                        <div id="for-name" >
                        <input type="text" class="form-control"  placeholder="Description" name="desc" value="{{old('desc')}}">
                    </div>
                    <x-error name="desc"/>
                    </div>
                   </div>
                 
                   <div class="col-sm-4">
                    <div class="form-group">
                        <p class="mg-b-10">purchase price</p>
                        <div  id="for-purchase_price" >
                        <input type="number" class="form-control"  placeholder="purchase price" name="purchase_price" id="purchase_price" value="{{old('purchase_price')}}">
                    </div>
                    <x-error name="purchase_price"/>
                    </div>
                   </div>
                   <div class="col-sm-4">
                    <div class="form-group">
                        <p class="mg-b-10">selling price</p>
                        <div  id="for-selling_price" >
                        <input type="number" class="form-control"  placeholder="selling price" name="selling_price" value="{{old('selling_price')}}">
                    </div>
                    <x-error name="selling_price"/>
                    </div>
                   </div>
                   <div class="col-sm-4">
                    <div class="form-group">
                        <p class="mg-b-10">stock</p>
                        <div  id="for-stock" >
                        <input type="number" class="form-control"  placeholder="stock" name="stock" id="stock" value="{{old('stock')}}">
                    </div>
                    <x-error name="stock"/>
                    </div>
                   </div>
                   <div class="col-sm-4">
                    <p class="mg-b-10 mr-2">category</p>
                   
                    <select  class="custom-select" name="category_id" id="category" value="{{old('category_id')}}"
                    >
                        <option>category</option>
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    
                    <x-error name="category_id"/>
                </div>
                   <div class="col-sm-4">
                    <p class="mg-b-10 mr-2">sub category</p>
                   
                    <select  class="custom-select" name="sub_category_id" id="subCategory"
                    >
                        <option>Please select a category first</option>
                    </select>
                    
                    <x-error name="sub_category_id"/>
                </div>
                <div class="col-sm-6">
                    <p class="mr-2">Tags</p>
                    <select class="js-example-basic-single" name="tag_id[]" multiple="multiple" style="width: 24rem">
                        <option>Tags</option>
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select> 
                    <x-error name="tag_id"/>
                </div>
                <div class="col-md-10 mx-auto my-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div>
                </div> 
                <div class="col-md-8 mx-auto my-4">
                    <h3>Total Cost: <span id="total"></span></h3>
                </div>
              </div>          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
{{-- Modal End --}}