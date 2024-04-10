@extends('admin-panel::layouts.app')

@section('header_title', trans('admin-panel::sidebar.users'))

@section('content')

    <form method="POST" action="{{ route('admin.roles.update', ['role' => $role]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input name="name" type="text" id="name" class="form-control" value="{{ old('name') ?? $role->name }}">
                        </div>

                        <div class="form-group">
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input @if($role->hasPermissionTo($permission->name)) checked @endif name="permissions[]" id="permission-{{ $permission->id }}" value="{{ $permission->id }}"
                                           class="form-check-input" type="checkbox">
                                    <label for="permission-{{ $permission->id }}"
                                           class="form-check-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update role" class="btn btn-success float-right">
            </div>
        </div>
    </form>
@endsection
