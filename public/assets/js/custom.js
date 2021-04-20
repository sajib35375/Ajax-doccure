(function($){
    $(document).ready(function () {
        $('.logout-cls').click(function () {
            $('#logout-form').submit()
        });

        $('#modal_view').click(function (e) {
            e.preventDefault();

            $('#role_modal_view').modal('show');
        });

        function allRole() {
            // $('#role_form').submit(function (e){
            //     e.preventDefault();
            $.ajax({
                url: 'role/show',
                success: function (data) {
                    $('#role-body').html(data);
                }
            });
            // });
        }

        allRole();

        // status update

        $(document).on('click', 'a#status_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('status_id');
            $.ajax({
                url: 'status/update/' + id,
                success: function (data) {
                    allRole();
                }
            });
        });
        $(document).on('click', '#edit_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('edit_id');

            $.ajax({
                url: 'Role/edit/' + id,
                success: function (data) {
                    $('#role_modal_edit').modal('show');
                    $('#role_edit_form input[name="name"]').val(data.name);
                    $('#role_edit_form input[name="update_id"]').val(data.id);
                    $('#role_edit_form .role-box').html(data.permission);


                    allRole();

                }

            });
            // Role update

            $('#role_edit_form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'Role/update',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        allRole();
                        $('#role_modal_edit').modal('hide');
                        swal('success', 'data updated successfully', 'success');
                    }
                });
            });
        });

        $(document).on('click','a#delete_btn',function (e){
            e.preventDefault();
            let id = $(this).attr('delete_id');
            swal({
                title:'Delete',
                text:'Are you sure?',
                buttons:['cancel','delete'],
                dangerMode:true,

            }).then((ghotona)=>{
                if (ghotona){
                    $.ajax({
                       url:'Role/delete/'+id,
                        success:function (data){
                            allRole();
                            swal('success','data deleted successfully','success');
                        }
                    });
                }else{
                    swal('data safe');
                }
            });
        });
        // user modal

        $(document).on('click','a#user_modal_show',function (e){
            e.preventDefault();
            $('#add_user_modal').modal('show');

        });
        $('#user_modal_form').submit(function (e){
            e.preventDefault();

            $.ajax({
                url:'user/store',
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function (data){
                    if (data){
                        $('#add_user_modal').modal('hide');
                        swal('success','data insert successfully','success')
                    }
                    // alert(data);

                }
            });

        });

        allData();
        function allData(){
            $.ajax({
                url:'user/show',
                success:function (data){
                    $('#user_table').html(data);
                    allData();
                }
            })

        }
        $(document).on('click','#show_view',function (e){
            e.preventDefault();
            let id = $(this).attr('view_id');

            $.ajax({
               url : 'user/view/'+id,
               success:function (data){

                   $('#profile_view_modal img').attr('src','media/img/' + data.photo);
                   $('#profile_view_modal table td#name').html(data.name);
                   $('#profile_view_modal table td#email').html(data.email);
                   $('#profile_view_modal table td#cell').html(data.cell);
                   $('#profile_view_modal table td#username').html(data.username);
                   $('#profile_view_modal').modal('show');

               }
            });
        });






    });
})(jQuery)
