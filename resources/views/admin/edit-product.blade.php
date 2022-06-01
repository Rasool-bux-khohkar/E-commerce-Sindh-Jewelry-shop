@extends('../layout.admin_master')

@section('content')

<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Update Product</span>
        <h3 class="page-title">Update Product</h3>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-10 col-md-12">
        <div class="card card-small mb-3">
          <div class="card-body">
            <form method="POST" action="{{ route('update-product-process', $products->id) }}" class="add-new-post" enctype="multipart/form-data">
              @csrf()
              <input name="product_title" value="{{ $products->title }}"  class="form-control form-control-lg mb-3" type="text" placeholder="Product Title">
              <textarea name="product_description" class="form-control form-control-lg mb-3" rows="8" placeholder="Description">{{ $products->description }}</textarea>
              <input name="product_weight" value="{{ $products->weight }}" class="form-control form-control-lg mb-3" type="text" placeholder="Product Weight">
              <input name="product_price" value="{{ $products->price }}" class="form-control form-control-lg mb-3" type="text" placeholder="Product Price">
              <input name="product_quantity" value="{{ $products->quantity }}" class="form-control form-control-lg mb-3" type="number" placeholder="Product Quantity">
              <input name="product_inventory" value="{{ $products->low_inventory }}" class="form-control form-control-lg mb-3" type="number" placeholder="Product Low Inventory">
              <input name="product_shippingcharges" value="{{ $products->shipping_charges }}" class="form-control form-control-lg mb-3" type="number" placeholder="Product Shipping Charges">
              <input name="product_free_shipping" class="mb-3" type="checkbox" {{  ($products->is_free_shipping == 1 ? ' checked' : '') }} value="1"> Free Shipping
              <input name="product_featured" type="checkbox" {{  ($products->is_featured == 1 ? ' checked' : '') }} value="1"> Featured
              <input name="product_is_comments" class="mb-3"  type="checkbox" {{  ($products->is_comment_allowed == 1 ? ' checked' : '') }} value="1" > Comment Allowed
              <input name="product_is_rating" type="checkbox" {{  ($products->is_rating_allowed == 1 ? ' checked' : '') }} value="1"> Rating Allowed
              {{-- <div class="form-group">
                <select name="category"  id="category" class="form-control form-control-lg mb-3">
                  <option value="">SELECT CATEGORY</option>
                  @foreach ($categories as $value)
                      <option value="{{$value->id}}">{{ $value->category }}</option>
                  @endforeach
                </select>
              </div> --}}
              {{-- <div class="form-group">
                <select name="sub_category" id="sub_category"  class="form-control form-control-lg mb-3">
                  <option value="">SELECT SUB CATEGORY</option>
                </select>
              </div> --}}
              <input type="file" value="{{ $product_image->image_path }}" class="form-control form-control-lg mb-3" name="image[]" multiple>
              <input type="submit" name="update_product" value="Upate Product" class="btn btn-success">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


{{-- @push('scripts')

<script>
      $('#category').on('change', function(e) {
          var cat_id = e.target.value; 
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/sub-category',
              data: {'cat_id': cat_id},
              success: function(data){
               console.log(data)
               $('#sub-category').empty();
               $.each(data, function(index, subcatObj){
                  $('#sub_category').append('<option value="'+subcatObj.id+'" >'+subcatObj.category+'</option>');
               });
              }
          });
      })
</script>

@endpush
   --}}