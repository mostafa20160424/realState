<?php

use App\Bu;

if (!function_exists('active_menu')) {
    function active_menu($link)
    {
        //preg_match("/search/",'word',return value from search);
      if( preg_match('/'.$link.'/i', Request::segment(2)))// i for neglegate cas sensetive
      //Request::segment(2) mean the second path after public("project path")
      {
        return ['active',Request::segment(3)];
      }
      else{
        return ['',''];
      }
    }
  }

  if (!function_exists('v_image')) {
    function v_image($ext=null)
    {
      if($ext == null){
        return "mimes:jpg,jpeg,png,gif,bmp";
      }
      return "mimes:".$ext;
    }
  }


    function img_path($img)
    {

      return Request::root().'/website/bu_images/'.$img;
    }
  

  if (!function_exists('active_link')) {
    function active_link($link,$get='')
    {
        //preg_match("/search/",'word',return value from search);
      if(preg_match_all('/'.$link.'/i', Request::segment(1)))// i for neglegate cas sensetive
      //Request::segment(2) mean the second path after public("project path")
      {
          
          $t=isset($_GET['bu_rent'])?(int) $_GET['bu_rent']:Request::segment(2);
          
          return ['active',$t];
      }
      else{
        return [' ',' '];
      }
    }
  }

  function getSetting($search='sitename')
  {
    $all=\App\Setting::all();
    if(count($all)>0)
    {
      return \App\Setting::where('name',$search)->get()[0]->value;
    }
    return '';
  }

  function bu_type()
  {
      $array=[
        'شقه',
        'فيله',
        'شاليه',
        'شركه',
      ];

      return $array;
  }

  function bu_rent()
  {
      $array=[
        'تمليك',
        'ايجار',
      ];

      return $array;
  }

  function bu_status()
  {
      $array=[
        'غير مفعل',
        'مفعل',
      ];

      return $array;
  }

  function rooms()
  {
      $array=[];
      for($i=2;$i<=40;$i++)
      {
        $array[$i]=$i;
      }
      return $array;
  }

  function bu_place()
  {
    $array=[
      "القاهرة الجديدة - التجمع الخامس",
      " أكتوبر",
       "مدينة الشيخ زايد",
       "مصر الجديدة",
       "مدينة نصر",
       "المعادي",
       "الشروق وهليوبليس الجديدة",
       "العبور",
       "الهضبة الوسطى",
       "الرحاب ومدينتي",
       "فيصل",
      "طريق اسكندرية الصحراوي",
       "الزمالك",
       "المهندسين",
      "الدقي",
       "الهرم",
       "حي الجيزة",
       "المقطم",
       "حلوان",
       "عين شمس",
       "مدينة بدر",
       "العاشر من رمضان",
      "جاردن سيتي",
       "وسط البلد",
       "حدائق القبة",
       "حدائق الاهرام",
       "شبرا",
       "إمبابة",
     "العجوزة",
      "المنيل",
       "العباسية",
       "15 مايو",
       "القاهرة الكبرى",
       "المطرية",
      "العاصمة الإدارية الجديدة",
      "سموحة",
      "رشدي",
      "ان استيفانو",
     " ميامي",
      "كفر عبده",
      "سيدي جابر",
      "سيدي بشر",
      "الهانوفيل",
      "برج العرب",
      "البيطاش",
      "كامب شيزار",
      "السيوف",
      "جليم",
      "المندرة",
      "العصافرة",
      "محرم بك",
      "الإبراهيمية",
      "فلمنج",
      "ستانلي",
      "بولكلي",
      "زيزينيا",
     " باكوس",
      "جناكليس",
      "المعمورة",
      "سبورتنج",
      "سابا باشا",
      "الحضرة",
      "الشاطبي",
      "كينج مريوط",
      "كليوباترا",
      "المنشية",
      "الأنفوشى",
      "المنتزه",
      "النخيل",
      "أبو تلات",
      "أحياء أخرى فى الأسكندرية",
      "ميامى الجديده",
     "ميامى",
     "الساحل الشمالى",
     "مرسى مطروح",
     "العين السخنة",
     "الغردقة / البحر الأحمر",
     "شرم الشيخ",
     "الدقهلية",
     "الشرقية",
     "الغربية",
     "الاسماعيلية",
     "دمياط",
     "السويس",
     "البحيرة",
     "أسوان",
     "الاقصر",
     "أسيوط",
     "المنوفية",
     "قنا",
     "سوهاج",
     "شمال سيناء",
     "الفيوم",
     "بور سعيد",
     "كفر الشيخ",
    " بني سويف",
     "المنيا",
     "الوادي الجديد",
     "القليوبية",
     "خارج مصر",
     "جنوب سيناء",
    ];

    return $array;

  }

  function message_subject()
  {
      $array=[
        '1'=>"اعجاب",
        '2'=>"مشكله",
        '3'=>"اقتراح",
        '4'=>"استفسار",
      ];
      return $array;
  }

  function contact_type()
  {
    $array=[
      'عضو',
      'مشرف',
      'زائر',

    ];
    return $array;
  }

  function set_active_head($value){
    session()->put('head',$value);
  }
 
  function get_active_head(){
    return session()->has('head')?session()->get('head'):'';
  }
 
function get_bus_count($val)
{
  return Bu::where('bu_status',$val)->count();
}

function get_bus_unactive()
{
  $array;
  $array['count']=Bu::where('bu_status',0)->count();
  $array['all']=Bu::where('bu_status',0)->get();

  return $array;
}