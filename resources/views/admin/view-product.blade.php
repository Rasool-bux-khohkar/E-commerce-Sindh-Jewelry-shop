@extends('../layout.admin_master')


@section('content')

<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Products Data Tables</h3>
      </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
        </div> 
	@endif
    <div class="row">
      <div class="col">
        <div class="card card-small overflow-hidden mb-4">
          <div class="card-header bg-dark">
            <h6 class="m-0 text-white">Products</h6>
          </div>
          <div class="card-body p-0 pb-3 bg-dark text-center">
            <table class="table table-dark mb-0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="border-bottom-0">#</th>
                  <th scope="col" class="border-bottom-0">Name</th>
                  <th scope="col" class="border-bottom-0">Price</th>
                  <th scope="col" class="border-bottom-0">weight</th>
                  <th scope="col" class="border-bottom-0">Edit</th>
                  <th scope="col" class="border-bottom-0">Delete</th>
                </tr>
              </thead>
              <tbody>
                  
                  @foreach ($products as $product)            
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{$product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->weight }}</td>
                    <td><a href="{{ route('update-product', $product->id)}}"><button type="button" class="btn btn-primary btn-sm">Update</button></a></td>
                    <td><a href="{{ route('remove-product', $product->id)}}"><button type="button" class="btn btn-primary btn-danger btn-sm">Delete</button></a></td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          {{$products->links()}}
      </div>
    </div>
  </div>
@endsection

{{-- @push('scripts')

    <script>
        $(".btn-danger").click(function (ev) {
            var id = $(this).data('id');
            // alert(id);
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove-from-product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: id 
                    },
                    success: function (data) {
                            alert(data);
                        },
                    error: function (data) {
                            alert(data);
                            console.log(data);
                        }
                    });
                    
            }
        });
    </script>

@endpush --}}


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