@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Register</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Register</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
<div class="row">

<div class="col-lg-2 mb-3">
    <a class="btn btn-success" href="{{ route('admin.register') }}">
      Add User
    </a>
</div>

<!-- Left side columns -->
<div class="col-lg-12">
  <div class="row">

    <!-- Recent Sales -->
    <div class="col-12">
      <div class="card recent-sales overflow-auto">

        <div class="card-body">
          <h5 class="card-title">All USERS</span></h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($users as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if($user->role_id == 1)
                      <span class="badge bg-success">Administrator</span>
                    @elseif($user->role_id == 2)
                      <span class="badge bg-warning">Mart Worker</span>
                    @else
                      <span class="badge bg-danger">Committee</span>
                    @endif
                  </td>
                  <td>{{ $user->created_at->format('d/m/Y') }}</td>
                  
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"><i class="bi bi-trash"></i></button>

                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1">
                      <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this user?
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                      </div>
                    </div><!-- End Basic Modal -->
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>

        </div>

      </div>
    </div><!-- End Recent Sales -->

  </div>
</div>

</div>
</section>

@endsection

@push('scripts')
  <script>document.getElementById("viewusers").classList.remove("collapsed");</script>
@endpush