@extends('../layout.admin_master')


@section('content')

<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Users Data Tables</h3>
      </div>
    </div>

      <div class="d-none alert alert-success" id='msg'>
      </div>

    <div class="row">
      <div class="col">
        <div class="card card-small overflow-hidden mb-4">
          <div class="card-header bg-dark">
            <h6 class="m-0 text-white">Users</h6>
          </div>
          <div class="card-body p-0 pb-3 bg-dark text-center">
            <table class="table table-dark mb-0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" class="border-bottom-0">#</th>
                  <th scope="col" class="border-bottom-0">Avator</th>
                  <th scope="col" class="border-bottom-0">Full Name</th>
                  <th scope="col" class="border-bottom-0">Mobile</th>
                  <th scope="col" class="border-bottom-0">Email</th>
                  <th scope="col" class="border-bottom-0">Role</th>
                  <th scope="col" class="border-bottom-0">Is-Active</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)            
                  <tr>
                    <td>{{ $user->user_id }}</td>
                    <td><img src="{{$user->avatar}}"/></td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_name }}</td>
                    <td>
                      @if ($user->status == 'active')
                       <input class="toggle-class" type="checkbox" data-id={{$user->user_id}} data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="active" data-off="pending" {{ $user->status == 'active' ? 'checked' : '' }}> 
                    @elseif ($user->status == 'pending')
                    <input class="toggle-class" type="checkbox" data-id={{$user->user_id}} data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="active" data-off="pending" {{ $user->status == 'active' ? 'checked' : '' }}>
                    @endif
                    </td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          {{$users->links()}}
      </div>
    </div>
  </div>
@endsection


@push('scripts')

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
  
@endpush