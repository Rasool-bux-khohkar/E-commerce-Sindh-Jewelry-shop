@extends('../layout.admin_master')

@section('content')

<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Add Sub-category</span>
        <h3 class="page-title">Add Sub-category</h3>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-9 col-md-12 text-center text-success">
        <div class="card card-small mb-3">
          <div class="card-body">
            <form method="POST" action="{{ url('add-subcategory-process') }}" class="add-new-post" enctype="multipart/form-data">
              @csrf()
              <div class="form-group">
                <select name="category"  id="category" class="form-control form-control-lg mb-3">
                  <option value="">SELECT CATEGORY</option>
                  @foreach ($categories as $value)
                      <option value="{{$value->id}}">{{ $value->category }}</option>
                  @endforeach
                </select>
              </div>
              <input name="subcategory" class="form-control form-control-lg mb-3" type="text" placeholder="Add subCategory">
              <input type="submit" name="add_subcategory" value="Add SubCategory" class="btn btn-success">
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