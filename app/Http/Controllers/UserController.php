<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = Role::all();
        return view('auth.user.index',[
            'user_data' => $data
        ]);
    }
    public function store(Request $request){
        if ($request->hasFile('photo')){
            $file=$request->file('photo');
            $unique_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/img'),$unique_name);
        }

        Staff::create([
            'name'=>$request->name,
            'role_id'=>$request->role_id,
            'email'=>$request->email,
            'cell'=>$request->cell,
            'username'=>$request->username,
            'gender'=>$request->gender,
            'edu'=>$request->edu,
            'photo'=>$unique_name,
            'password'=>$request->password,
        ]);
        return redirect()->back();


    }
    public function show(){
        $data = Staff::all();
        $output='';
        $i=1;
        foreach ($data as $user){
            $output.='<tr>';
            $output.='<td>'.$i.'</td>';
            $output.='<td>'.$user->name.'</td>';
            $output.='<td>'.$user->role_id.'</td>';
            $output.='<td>'.$user->email.'</td>';
            $output.='<td>'.$user->cell.'</td>';
            $output.='<td>'.$user->username.'</td>';
            $output.='<td>'.$user->gender.'</td>';
            $output.='<td>'.$user->edu.'</td>';
            $output.='<td><img style="width: 60px;height: 60px;" src="media/img/'. $user->photo   .'"></td>';
            $output.='<td><a id="show_view" class="btn btn-sm btn-info" view_id="'.$user->id.'" href="#">view</a><a class="btn btn-sm btn-primary" href="#">edit</a><a class="btn btn-sm btn-danger" href="#">delete</a></td>';
            $output.='</tr>';
        }
        return $output;
    }
    public function view($id){
        return Staff::find($id);
    }
}
