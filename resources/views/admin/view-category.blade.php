@extends('../layout.admin_master')


@section('content')

<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Categories Data Tables</h3>
      </div>
    </div>
    {{-- @dd(session('success')); --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      {{-- <div class="d-none alert alert-success" id='msg'>
      </div> --}}
      {{-- @dd($view_categories); --}}
    <div class="row">
      <div class="col">
        <div class="card card-small overflow-hidden mb-4">
          <div class="card-header bg-dark">
            <h6 class="m-0 text-white">Categories</h6>
          </div>
          <div class="card-body p-0 pb-3 bg-dark text-center">
            <table class="table table-dark mb-0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="border-bottom-0">#</th>
                  <th scope="col" class="border-bottom-0">Category</th>
                  <th scope="col" class="border-bottom-0">parent_category_id</th>
                  <th scope="col" class="border-bottom-0">Edit</th>
                  <th scope="col" class="border-bottom-0">Delete</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($view_categories as $category)            
                  <tr>
                    @if($category->parent_category_id != null )
                    <td>{{ $category->id }}</td>
                    <td>
                        {{ $category->category }}
                      </td>
                      <td>
                        {{-- @if($category->parent_category_id == $category->id) --}}
                          {{ $category->parent_category_id }}
                          {{-- @endif --}}
                        </td>
                        <td><a href="{{ route('update-category', $category->id)}}"><button type="button" class="btn btn-primary btn-sm">Update</button></a></td>
                        <td><a href="{{ url('delete-category', $category->id )}}"><button type="button" class="btn btn-primary btn-sm">Delete</button></a></td>
                        @endif
                        @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          {{$view_categories->links()}}
      </div>
    </div>
  </div>
@endsection


{{-- @push('scripts')

  <script>
    // $(function() {
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 'active' : 'pending';
            // alert(status); 
            var user_id = $(this).data('id'); 
            // alert(user_id);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                  // data.success
                  $('#msg').html(data.success).fadeIn('slow').removeClass('d-none').addClass('show');
                  $('#msg').delay(1000).fadeOut('slow');
                }
            });
        })
        // })
  </script>
  
@endpush --}}