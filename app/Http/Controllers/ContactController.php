<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DataTables;

class ContactController extends Controller
{
    public function index()
    {
        
        return view('admin.contact.index');        
    }
    
    public function create()
    {
        set_active_head('contact');        
        return view('website.contact.contact');        
    }

    public function store(Request $request,Contact $contact)
    {
        //dd(request()->all());
        
        $data=$this->validate(request(),[
            'name'=>"required",
            'email'=>"required|email",
            'subject'=>"required|integer",
            'message'=>"required",
        ],[],[
            'name'=>"من فضلك ادخل الاسم",
            'email'=>"من فضلك ادخل البريد الالكترونى  ",
            'subject'=>"من فضلك ادخل  عنوان الرساله  ",
            'message'=>"من فضلك ادخل  مضمون الرساله  ",
        ]);
        
        $data['contact_type']=(auth()->user())?1:0;
        $data['view']=0;
        Contact::create($data);
        return redirect('/')->withFlashMessage("تم الارسال بنجاح");    
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        return redirect('admin/contact')->withFlashMessage("تم الحذف");
    }

    public function anyData(Contact $contact)
    {

      $contacts = $contact->all();

        return Datatables::of($contacts)

            ->editColumn('name', function ($model) {//$model is user of $users
                return $model->name;
            })
            ->editColumn('email', function ($model) {
                return $model->email;
            })

            ->editColumn('contact_type', function ($model) {

                return  '<span class="badge badge-info">' .contact_type()[$model->contact_type]. '</span>' ;
            })


            ->editColumn('subject', function ($model) {

                return  '<span class="badge badge-info">' . message_subject()[$model->subject]. '</span>' ;
            })

            ->editColumn('view', function ($model) {

                return  '<a class="btn btn-primary" href=""> تم الرد</a>' ;
            })

            
            ->editColumn('control', function ($model) {//control is name you write in columns{data:} in js
                $all = '<a href="' . url('/admin/contact/delete'.'/'. $model->id  ) . '" onclick="return run()" class="btn btn-danger btn-circle  btn-sm delete"><i class="fa fa-trash-o"></i></a>';
                
                return $all;
            })->rawColumns(['control','subject','view','contact_type',])
            ///must add rawColumns(['column name that has html code understand html])
            ->make(true);

    }
}
