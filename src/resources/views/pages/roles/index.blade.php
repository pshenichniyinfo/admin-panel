@extends('admin-panel::layouts.app')

@section('header_title', trans('admin-panel::sidebar.users'))

@section('head_left_btn')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-block btn-success w-25 float-right">
        <i class="fa-solid fa-plus"></i> Add Role
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', [$role]) }}">
                                <i class="fas fa-folder"></i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.roles.edit', [$role]) }}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            @if($role->name === 'super-admin')
                                <span class="btn btn-secondary btn-sm user-select-none">
                                    <i class="fa-solid fa-ban"></i>
                                    Delete
                                </span>
                            @else
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.roles.delete', ['role' => $role]) }}">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
