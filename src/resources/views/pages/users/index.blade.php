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
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', ['user' => $user]) }}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            @if($user->id === $superAdmin->id)
                                <span class="btn btn-secondary btn-sm user-select-none">
                                    <i class="fa-solid fa-ban"></i>
                                    Delete
                                </span>
                            @else
                                <form method="POST" action="{{ route('admin.delete', ['user' => $user]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            @endif
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
