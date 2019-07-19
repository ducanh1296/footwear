@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                <div class="card-header">User List</div>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                            <tr class="row_{{ $user->id }}">
                              <th scope="row">{{ $user->id }}</th>
                                <td>
                                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                                </td>
                              <td>{{ $user->email }}</td>
                              <td>
                                  <a href="users/{{ $user->id }}/edit" class="btn btn-info" role="button">{{ __('user.Edit') }}</a>
                                  <form action="{{ route('admin.user.destroy',[$user->id]) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-info" type="submit">{{ __('user.Delete') }}</button>
                                  </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
