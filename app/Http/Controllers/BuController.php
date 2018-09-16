<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bu;
use App\User;
use DataTables;
use App\Http\Requests\BuRequest;
use Html;
class BuController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['auth'=>['only'=>['function name']]]);
    }

    public function index()
    {
        
        $id=request('id');
        
        return view('admin.bu.index',compact('id'));
    }


    public function delete($id)
    {
        $bu=Bu::find($id);
        if(!empty($bu)){
            $img=$bu->image;
            if($img!="no-image-800x511.png")
            {
                unlink(\base_path('/public/website/bu_images/'.$img));
            }
            $bu->delete();
            return redirect('admin/bus')->withFlashMessage("تم مسح العقار بنجاح");       
        }
        return redirect('admin/bus'); 
    }

    public function create()
    {
        return view('admin.bu.add');        
    }

    public function user_add_bu()
    {
        return view("website.userbu.user_add");
    }

    public function user_edit_bu($id)
    {
        $bu=Bu::find($id);
        if(!empty($bu)){
        return view("website.userbu.user_edit",compact('bu'));
        }
        return redirect('/');
    }

    public function edit($id)
    {
        $bu=Bu::find($id);
        if(!empty($bu)){
            $user = User::where('id',$bu->user_id)->first();
            return view('admin.bu.edit',compact('bu','user'));        
        }
        return redirect('admin/bus');
    }
    
    public function search(Request $request)
    {
        /*
        $reqAll=array_except(request()->all(),['_token','submit']);
        
        $out='';
        $i=0;
        foreach($reqAll as $key=>$value)
        {
            if($value!=null)
            {
                $i==0?$out.=' where ':$out.=' and ';
                $out.=$key.' = '.$value;
                $i++;
            }
        }
        $bus=DB::select('select * from bus'.$out);cant use paginate()
        */
        $reqAll=array_except($request->all(),['_token','submit','page']);
        $query=DB::table('bus')->select('*');
        $array=[];
        $min=$request->bu_price_from?$request->bu_price_from:50000;
        $max=$request->bu_price_to?$request->bu_price_to:100000000;
        
        $max=($max<$min)?100000000:$max;
        $getin=0;
        $array['bu_price_from']=$min;
        foreach($reqAll as $key=>$value) //get the $_GET Data
        {
            if($value!=null)//cant use if($value) because value may be 0 and i use it
            {
                if(($key=="bu_price_to" || $key=="bu_price_from") && $getin==0){
                    $query->whereBetween('bu_price',[$min,$max]);
                    $getin++;
                }else if($key!="bu_price_to" && $key!="bu_price_from" ){
                    $query->where($key,$value);
                }
                if($key=="bu_price_to"){
                    $value=$max;
                }
                $array[$key]=$value;
            }
        }
        if(isset($_GET['bu_rent'])){
           $x=$_GET['bu_rent']==0?'buy':'rent';
            set_active_head($x);        
        }
        $bus=$query->paginate(3);
        return view('website.bu.all',compact('bus','array'));
    }

    public function update($id,BuRequest $request)
    {
   
        $this->updateAll($id, $request);    

        return redirect('admin/bus')->withFlashMessage("تم تعديل العقار بنجاح");              
    }

    public function user_update_bu($id,BuRequest $request)
    {
        $this->updateAll($id, $request);
        return redirect('/')->withFlashMessage("تم تعديل العقار بنجاح");     
    }


    public function updateAll($id,BuRequest $request)
    {
        $data=array_except($request->toArray(),['_token','_method']);
        $img=Bu::find($id)->image;
        if($request->hasFile('image')&&!empty($request->file('image')))
        {
            if($img!="no-image-800x511.png")
            {
                if(is_file(base_path('/public/website/bu_images/'.$img))){
                    unlink(\base_path('/public/website/bu_images/'.$img));
                }
            }
            $filename=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                \base_path('/public/website/bu_images/'),$filename
            );
            $data['image']=$filename;
            //request()->file('image')
        }else{
            
            if(empty($img)){
                $data['image']="no-image-800x511.png";
            }else{
                $data['image']=$img;
            }
        }
        Bu::where('id',$id)->update($data);
    }

    public function add(BuRequest $request,Bu $bu)
    {
        $data=array_except($request->all(),['_method','_token','user']);
        //then $data is array(input name=>'value') and i put input name same like col name in db
        $data['user_id']=auth()->user()->id;
        if($request->hasFile('image'))
        {
            $filename=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                \base_path('/public/website/bu_images/'),$filename
            );
            $data['image']=$filename;
            //request()->file('image')
        }else{
            $data['image']="no-image-800x511.png";
        }
        
        $data['bu_status']=$request->has('bu_status')?$request->bu_status:0;
        
        $bu->create($data);//Bu::create($data);
    }
    
    public function store(BuRequest $request,Bu $bu)
    {
        /*
        $data=$this->validate(request(),[
            'bu_name'=>'required|min:5|max:100',//inputname=>validation
            'bu_price'=>'required',
            'bu_rent'=>'required|double',
            'bu_square'=>'required|integer',
            'bu_type'=>'required|integer',
            'bu_small_ds'=>'required|min:5|max:160',
            'bu_meta'=>'required',
            'bu_langtude'=>'required',
            'bu_latitude'=>'required',
            'bu_large_ds'=>'required|min:5',
            'bu_status'=>'required|integer',
            'rooms'=>'required|integer',
        ]);
        */
        /*
        $data=[
            'col name in db'=>$request->input name 
            ]

            $validator = Validator::make($input, $rules, $messages);

            Validator::make([
            'rooms'=>'required|integer',                
            ])
            $request->validate([
            'rooms'=>'required|integer',                
            ])
        */
          
        $this->add($request,$bu);

        return redirect('admin/bus')->withFlashMessage('تم اضافه العقار بنجاح');
        
    } 

    public function user_add_post(BuRequest $request,Bu $bu)
    {
        $this->add($request,$bu);
        
        return redirect('/')->withFlashMessage('تم اضافه العقار بنجاح'); 
    }



    public function showSingle($id)
    {
        $bu=Bu::find($id);
        $same_rent=Bu::where('bu_rent',$bu->bu_rent)->where('id','!=',$bu->id)->orderBy(DB::raw('RAND()'))->take(5)->get();
        $same_type=Bu::where('bu_type',$bu->bu_type)->where('id','!=',$bu->id)->orderBy(DB::raw('RAND()'))->take(5)->get();
        //every time will take a 5 bus randomlly
        $delete=[];
        $c=0;
        foreach($same_rent as $o)
        {
            foreach($same_type as $key=>$val)
            {
                if($val->id==$o->id)
                {
                    unset($same_type[$key]);
                }
            }
        }

        return view('website.bu.single',compact('bu'),['sameRent'=>$same_rent,'sameType'=>$same_type]);
        //can use compact('bu','same_rent','same_type');
    }

    public function welcome()
    {
        $bus=Bu::where('bu_status',1)->orderBy('id','desc')->get();
        set_active_head('');
        return view('welcome',compact('bus'));        
    }

    public function active_bu()
    {
        $bus=Bu::where('bu_status',1)->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('bus'));
    }

    public function unactive_bu()
    {
        $bus=Bu::where('bu_status',0)->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('bus'));
    }

    public function showAll($name='')
    {
        $bus=Bu::where('bu_status',1)->orderBy('id','desc');
        switch($name)
        {

            case 'rent':
                $bus=$bus->where('bu_rent',1)->paginate(6);//paginate(number of data to show)
                break;
            case 'buy':
                $bus=$bus->where('bu_rent',0)->paginate(6);
                break;    
            case 'flats':
                $bus=$bus->where('bu_type',0)->paginate(6);
                break;   
            case 'fi':
                $bus=$bus->where('bu_type',1)->paginate(6);
                break;     
            case 'sh':
                $bus=$bus->where('bu_type',2)->paginate(6);
                break;   
            case 'company':
                $bus=$bus->where('bu_type',3)->paginate(6);
                break;    
            default:
                $bus=$bus->paginate(6);//
                break;             
        }
        set_active_head('showall');
        
        return view('website.bu.all',compact('bus'));

    }

    public function getAjaxInfo(Request $request , Bu $bu)
    {
        return $bu->find($request->id)->toJson();
    }

    public function anyData(Bu $bu,$u_id=null)
    {
        
        $bus =(is_numeric($u_id))? $bu->where('user_id',$u_id)->get() : $bu->all();
        if(preg_match_all('/^[a-z]+$/',$u_id)){
            $bus=[];
        }
        return Datatables::of($bus)

            ->editColumn('bu_name', function ($model) {//$model is user of $users
                return Html::link(url('/admin/bus/' . $model->id . '/edit'),$model->bu_name);
            })
            ->editColumn('bu_status', function ($model) {
                return $model->bu_status == 0 ? '<span class="badge badge-info">' . 'غير مفعل' . '</span>' : '<span class="badge badge-warning">' . ' مفعل' . '</span>';
            })

            ->editColumn('bu_type', function ($model) {
                $type=bu_type();

                return  '<span class="badge badge-info">' .$type[$model->bu_type] . '</span>' ;
            })

            ->editColumn('bu_place', function ($model) {
                $places=bu_place();

                return  '<span class="label label-info">' .$places[$model->bu_place] . '</span>' ;
            })

            
            ->editColumn('control', function ($model) {//control is name you write in columns{data:} in js
                $all = '<a href="' . url('/admin/bus/' . $model->id . '/edit') . '" class="btn btn-info btn-circl btn-sm"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/admin/bus/delete'.'/'. $model->id  ) . '" onclick="return confirm(`Are you Sure`);" class="btn btn-danger btn-circle  btn-sm delete"><i class="fa fa-trash-o"></i></a>';
                
                return $all;
            })->rawColumns(['control','bu_name','bu_status','bu_type','bu_place'])
            ///must add rawColumns(['column name that has html code understand html])
            ->make(true);

    }


}
