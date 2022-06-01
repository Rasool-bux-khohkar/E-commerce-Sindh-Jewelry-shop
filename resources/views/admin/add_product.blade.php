@extends('../layout.admin_master')

@section('content')
<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Add Product</span>
        <h3 class="page-title">Add New Product</h3>
      </div>
    </div>
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
 
    <div class="row d-flex justify-content-center">
      <div class="col-lg-10 col-md-12">
 
        <div class="card card-small mb-3">
          <div class="card-body">
            <form method="POST" action="{{ url('add-product-process') }}" class="add-new-post" enctype="multipart/form-data">
              @csrf()
              <input type="file" class="form-control form-control-lg mb-3" name="image[]" multiple>
              <input name="product_title" class="form-control form-control-lg mb-3" type="text" placeholder="Product Title">
              <textarea name="product_description" class="form-control form-control-lg mb-3" rows="8" placeholder="Description"></textarea>
              <input name="product_weight" class="form-control form-control-lg mb-3" type="text" placeholder="Product Weight">
              <input name="product_price" class="form-control form-control-lg mb-3" type="text" placeholder="Product Price">
              <input name="product_quantity" class="form-control form-control-lg mb-3" type="number" placeholder="Product Quantity">
              <input name="product_inventory" class="form-control form-control-lg mb-3" type="number" placeholder="Product Low Inventory">
              <input name="product_shippingcharges" class="form-control form-control-lg mb-3" type="number" placeholder="Product Shipping Charges">
              <input name="product_free_shipping" class="mb-3"  type="checkbox" value="1"> Free Shipping
              <input name="product_featured" type="checkbox" value="1"> Featured 
              <input name="product_is_comments" class="mb-3"  type="checkbox" value="1"> Comment Allowed
              <input name="product_is_rating" type="checkbox" value="1"> Rating Allowed
              <div class="form-group">
                <select name="category"  id="category" class="form-control form-control-lg mb-3">
                  <option value="">SELECT CATEGORY</option>
                  @foreach ($categories as $value)
                      <option value="{{$value->id}}">{{ $value->category }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <select name="sub_category" id="sub_category"  class="form-control form-control-lg mb-3">
                  <option value="">SELECT SUB CATEGORY</option>
                </select>
              </div>
              <input type="submit" name="add_product" value="Add Product" class="btn btn-success">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('scripts')

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
  