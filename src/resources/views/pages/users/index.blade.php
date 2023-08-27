@extends('admin-panel::layouts.app')

@section('header_title', trans('admin-panel::sidebar.users'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.show') }}">
                                <i class="fas fa-folder"></i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">Add User</a>
        </div>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
@endsection
