@extends('layouts.app')

@section('title')
 الاستفسار 
@endsection

@push('css')
<style>
.jumbotron {
    background: #358CCE;
    color: #FFF;
    border-radius: 0px;
    }
    .jumbotron-sm { padding-top: 24px;
    padding-bottom: 24px; }
    .jumbotron small {
    color: #FFF;
    }
    .h1 small {
    font-size: 24px;
    }
    .input-group-addon:first-child{
        border-left:0;
        
    }
</style>
@endpush



@section('content')
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    اتصل بنا <small>اتصل بنا مجانا 😀</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">

            <legend><span class="fa fa-globe"></span> اتصل بنا</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                {{getSetting('address')}}
                <br>
                <abbr title="Phone">
                    P:</abbr>
                {{getSetting('phone')}}
            </address>
            <address>
                <strong>{{ getSetting() }}</strong><br>
                <a href="mailto:#">mostafa_20160424@yahoo.com</a>
            </address>

        </div>
        <div class="col-md-8">
            <div class="well well-sm">
                <form method ="post" action="{{ route('contact.store') }}">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الرساله</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="الرساله"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الاسم</label>
                            <input type="text" {{auth()->user()?'readonly':''}} value="{{auth()->user()->name}}" class="form-control" id="name" name="name" placeholder="ادخل الاسم" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                البريد الالكترونى</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" value="{{ auth()->user()?auth()->user()->email:'' }}" {{auth()->user()?'readonly':''}} class="form-control" name="email" id="email" placeholder="البريد الالكترونى" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                موضوع الرساله</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="1" selected="">اعجاب</option>
                                <option value="2">مشكله</option>
                                <option value="3">اقتراح</option>
                                <option value="4">استفسار</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            ارسل</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
