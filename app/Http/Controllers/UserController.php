<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequestAdmin;
use App\User;
use App\Bu;
use DataTables;
use Html;
class UserController extends Controller
{
    
    public function index(){

        return view('admin.users.index');        
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function profile(Request $request)
    {
        $user=auth()->user();
        
        return view('website.userbu.profile',compact('user')); 
    }

    public function profile_patch(Request $request , $id)
    {
        $this->updateUser($request,$id);
        return redirect('/')->withFlashMessage('تم تعديل البيانات بنجاح');           

    }

    
    public function store(AddUserRequestAdmin $request , User $user)
    {
        /*
        User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>request('password'),
        ]);
        */
        $user->create([
            'name'=>$request->name,//$request->colname
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'admin'=>$request->adminSelect,
        ]);

        return redirect('admin/users')->with('success',"تم اضافه العضو بنجاح");
    }

    public function set_active_bu($id)
    {
           
        $data=array_except(request()->all(),['_method','_token','submit']);
        Bu::where('id',$id)->update($data);
        $array=[];
        $bu=Bu::find($id);
        $array=[];
        
        $array['message']=((int) request('bu_status')===1)?"تم التفعيل":"تم الغاء التفعيل";
        if(request()->ajax()){
            $array['result']=view('admin.users.active',compact('bu'))->render();
            $array['bu']=$bu;
            $array['tabel']=((int) request('bu_status')===1)?"t1":"t2";

            return response($array);
        }
        return back()->withFlashMessage($array['message']);              
        
      
    }


    public function delete($id)
    {
        User::find($id)->delete();
        if(!empty($user)){
             return redirect('admin/users')->with('success',"تم مسح العضو بنجاح");        
        }
        return redirect('admin/users');
    }

    public function edit($id,Bu $bu)
    {
        $user = User::find($id);
        if(!empty($user)){
        $bus_unactive=$bu->where('user_id',$id)->where('bu_status',0)->paginate(5);
        $bus_active=$bu->where('user_id',$id)->where('bu_status',1)->paginate(5);
        return view('admin.users.edit',compact('user','bus_unactive','bus_active'));
        }
        return redirect('admin/users');
    }

    public function update(Request $request,$id)
    {
        $this->updateUser($request,$id);      
        return redirect('admin/users')->withFlashMessage('تم تعديل البيانات بنجاح');      
        
    }

    public function updateUser(Request $request,$id)
    {
        $data= $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,// |unique:tablename will search any row have this email except this id
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);
            if(request('password')==""){
                $data['password']=User::find($id)->password;
            }else{
                $data['password']=bcrypt(request('password'));//$request->password
            }
            if(request()->has('admin')){
                $data['admin']=request('admin');
            }
            User::where('id',$id)->update($data);   
            
            
    } 

    public function anyData(User $user)
    {

      $users = $user->where('id','!=',auth()->user()->id)->get();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {//$model is user of $users
                return Html::link(url('/admin/users/' . $model->id . '/edit'),$model->name);
            })
            ->editColumn('admin', function ($model) {
                return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
            })//must add rawColumns(['column name to understand html])

            ->editColumn('my_bu', function ($model) {
                return   '<a href="'.url('admin/bus/'.$model->id).'"><span class="btn btn-danger btn-circle">' . '<i class="fa fa-link"></i>' . '</span></a>';
            })//must add rawColumns(['column name to understand html])
            
            ->editColumn('control', function ($model) {//control is name you write in columns{data:} in js
                $all = '<a href="' . url('/admin/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circl btn-sm"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/admin/users/delete'.'/'. $model->id  ) . '" onclick="return confirm(`Are you Sure`);" class="btn btn-danger btn-circle  btn-sm delete"><i class="fa fa-trash-o"></i></a>';
                
                return $all;
            })->rawColumns(['control','admin','name','my_bu'])
            ->make(true);

    }
}
