@extends('admin-panel::auth.layouts.app')

@section('content')

    @include('admin-panel::partials.messages')

    <div class="login-box">
        <div class="login-logo">
            Admin
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{ route('admin.login.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="@lang('admin-panel::auth.email')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="@lang('admin-panel::auth.password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                               @lang('admin-panel::auth.login.sign_in')
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
