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
{{--                        <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>--}}
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>

                        </ul>
                        <a id="user_modal_show" class="btn btn-sm btn-success" href="#">Add user</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <table class="table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role_id</th>
                    <th>Email</th>
                    <th>Cell</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>edu</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="user_table">

{{--                @foreach($user_data as $all)--}}
{{--                <tr>--}}
{{--                    <td>{{ $loop->index +1 }}</td>--}}
{{--                    <td>{{ $all->name }}</td>--}}
{{--                    <td>{{ $all->email }}</td>--}}
{{--                    <td>{{ $all->cell }}</td>--}}
{{--                    <td>{{ $all->username }}</td>--}}
{{--                    <td><img style="width: 60px;height: 60px;" src="media/img/{{ $all->photo }}" alt=""></td>--}}
{{--                    <td>--}}
{{--                        <a class="btn btn-sm btn-info" href="#">view</a>--}}
{{--                        <a class="btn btn-sm btn-warning" href="#">Edit</a>--}}
{{--                        <a class="btn btn-sm btn-danger" href="#">delete</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                @endforeach--}}

                </tbody>
            </table>

{{--    modal show--}}
         <div id="add_user_modal" class="modal fade">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h3>Add User</h3>
                     </div>
                     <div class="modal-body">
                         <form id="user_modal_form" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group">
                                 <label for="">Name</label>
                                 <input name="name" class="form-control" type="text">
                             </div>
                             <div class="form-group">
                                 <label for="">Role</label>
                                 <select class="form-control" name="role_id" id="">
                                     <option value="">-select-</option>
                                     @foreach($user_data as $user)
                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Email</label>
                                 <input name="email" class="form-control" type="text">
                             </div>
                             <div class="form-group">
                                 <label for="">Cell</label>
                                 <input name="cell" class="form-control" type="text">
                             </div>
                             <div class="form-group">
                                 <label for="">Username</label>
                                 <input name="username" class="form-control" type="text">
                             </div>
                             <div class="form-group">
                                 <label for="">Gender</label><br>
                                 <input name="gender" class="" value="Male" type="radio" id="male"><label for="male">Male</label>
                                 <input name="gender" class="" value="Female" type="radio" id="female"><label for="female">Female</label>
                             </div>
                             <div class="form-group">
                                 <label for="">Education</label>
                                 <select class="form-control" name="edu" id="">
                                     <option value="">-select-</option>
                                     <option value="JSC">-JSC-</option>
                                     <option value="SSC">-SSC-</option>
                                     <option value="HSC">-HSC-</option>
                                     <option value="BSC">-BSC-</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Photo</label>
                                 <input name="photo" class="form-control-file" type="file">
                             </div>
                             <div class="form-group">
                                 <label for="">Password</label>
                                 <input name="password" class="form-control" type="text">
                             </div>
                             <div class="form-group">
                                 <button type="submit">add</button>

{{--                                 <input class="btn btn-sm btn-success" name="submit" value="add"  type="submit">--}}
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

{{--view modal--}}
    <div id="profile_view_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img style="height: 200px;width: 200px;border-radius: 50%; margin: auto;display: block;" src="" alt="">
                    <table class="table table-striped">
                        <tbody style="text-align: center;">
                        <tr>
                            <td>Name</td>
                            <td id="name">Name</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="email">Name</td>
                        </tr>
                        <tr>
                            <td>Cell</td>
                            <td id="cell">Name</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td id="username">Name</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection
