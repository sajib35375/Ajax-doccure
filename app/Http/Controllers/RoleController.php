<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){
        $data = Role::all();
        return view('auth.user.role.index',[
            'role_data' => $data
        ]);
    }
    public function store(Request $request){
//        $per = '
//        <input name="per[]" value="Teacher" id="Teacher"  type="checkbox"><label for="Teacher">Teacher</label><br>
//        <input name="per[]" value="student" id="student"  type="checkbox"><label for="student">student</label><br>
//        <input name="per[]" value="staff" id="staff"  type="checkbox"><label for="staff">staff</label><br>
//        <input name="per[]" value="slider" id="slider"  type="checkbox"><label for="slider">slider</label><br>
//        <input name="per[]" value="Accounts" id="Accounts"  type="checkbox"><label for="Accounts">Accounts</label><br>
//        ';
        Role::create([
           'name' => $request->name,
           'slug' => Str::slug($request->name),
           'permission' => json_encode($request->per),
        ]);
        return redirect()->route('role.index')->with('success','Role added successfully');
    }
    public function show(){
        $all_role = Role::all();
        $output = '';
        $i=1;

        foreach ($all_role as $data){
            $per = json_decode($data->permission);
            if ($data->status=='Published'){
              $status_btn =  '<a id="status_btn" class="btn btn-sm btn-danger" status_id="'. $data->id .'" href="">Unpublished</a>';
            }else{
                $status_btn =  '<a id="status_btn" class="btn btn-sm btn-info" status_id="'. $data->id .'" href="">Published</a>';
            }


            if ($data->status=='Published'){
                $status = '<span class="badge badge-success">Published</span>';
            }else{
                $status = '<span class="badge badge-danger">Unpublished</span>';
            }


            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>'. $data->name .'</td>';
            $output .= '<td>'. $data->slug .'</td>';
            $output .= '<td>'. implode(',',$per) .'</td>';
            $output .= '<td>'. $status .'</td>';
            $output .= '<td>'.$status_btn.'
                               <a id="edit_btn" class="btn btn-sm btn-warning" edit_id="'.$data->id.'" href="">edit</a>
                               <a id="delete_btn" class="btn btn-sm btn-danger" delete_id="'.$data->id.'" href="#">delete</a>
                            </td>';
            $output .= '</tr>';
            $i++;
        }
        return $output;
    }
    public function statusUpdate($id){
        $data = Role::find($id);
        if ($data->status=='Published'){
            $data->status = 'Unpublished';
            $data->update();
        }else{
            $data->status = 'Published';
            $data->update();
        }
    }
    public function RoleEdit($id){
         $data = Role::find($id);
         $per = json_decode($data->permission);





         $box = '
        <input name="per[]" '.(in_array('Teacher',$per)? 'checked':'').' value="Teacher" id="TeacherEdit"  type="checkbox"><label for="TeacherEdit">Teacher</label><br>
        <input name="per[]" '.(in_array('student',$per)? 'checked':'').' value="student" id="studentEdit"  type="checkbox"><label for="studentEdit">student</label><br>
        <input name="per[]" '.(in_array('staff',$per)? 'checked':'').' value="staff" id="staffEdit"  type="checkbox"><label for="staffEdit">staff</label><br>
        <input name="per[]" '.(in_array('slider',$per)? 'checked':'').' value="slider" id="sliderEdit"  type="checkbox"><label for="sliderEdit">slider</label><br>
        <input name="per[]" '.(in_array('Accounts',$per)? 'checked':'').' value="Accounts" id="AccountsEdit"  type="checkbox"><label for="AccountsEdit">Accounts</label><br>

         ';
         return[
           'id' => $data->id,
           'name' => $data->name,
           'permission' => $box,
         ];



    }
    public function RoleUpdate(Request $request){

        $id = $request->update_id;

        $update_data = Role::find($id);
        $update_data->name = $request->name;
        $update_data->permission = json_encode($request->per);
        $update_data->update();

        return true;

    }
    public function RoleDelete($id){
        $delete_data = Role::find($id);
        $delete_data->delete();
        return true;
    }

}
