@extends('layouts.app')
@section('content')
    @include('layouts.header')







    @include('layouts.sidebar')




    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <a id="modal_view" class="btn btn-sm btn-primary" href="#">Add</a>
{{--                        <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>--}}
                        @if(Session::has('success'))
                            <p class="alert text-success">{{ Session::get('success') }}</p>
                        @endif
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Striped Rows</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Permission</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="role-body">
{{--                               @foreach($role_data as $d)--}}

{{--                                <tr>--}}
{{--                                    <td>{{ $loop->index+1 }}</td>--}}
{{--                                    <td>{{ $d->name }}</td>--}}
{{--                                    <td>{{ $d->slug }}</td>--}}
{{--                                    <td>{{ $d->permission }}</td>--}}
{{--                                    <td>{{ $d->status }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-success" href="#">view</a>--}}
{{--                                        <a class="btn btn-info" href="#">Edit</a>--}}
{{--                                        <a class="btn btn-danger" href="#">Delete</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                               @endforeach--}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

{{--    Role modal--}}

            <div id="role_modal_view" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add new Role</h3>
                        </div>
                        <div class="modal-body">
                            <form id="role_form" method="POST" action="{{ route('role.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Permission</label>
                                    <hr>
                                    <input name="per[]" value="Teacher" id="Teacher"  type="checkbox"><label for="Teacher">Teacher</label><br>
                                    <input name="per[]" value="student" id="student"  type="checkbox"><label for="student">student</label><br>
                                    <input name="per[]" value="staff" id="staff"  type="checkbox"><label for="staff">staff</label><br>
                                    <input name="per[]" value="slider" id="slider"  type="checkbox"><label for="slider">slider</label><br>
                                    <input name="per[]" value="Accounts" id="Accounts"  type="checkbox"><label for="Accounts">Accounts</label><br>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success btn-block" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



{{--    Role edit modal--}}
            <div id="role_modal_edit" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add new Role</h3>
                        </div>
                        <div class="modal-body">
                            <form id="role_edit_form"  method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" class="form-control" type="text">
                                    <input name="update_id" value="" type="hidden">
                                </div>
                                <div class="form-group">
                                    <label for="">Permission</label>
                                    <hr>
                                    <div class="role-box">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input value="update" class="btn btn-success btn-block" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
