@extends('layouts.app')

@section('title')
كل العقارات
@endsection

@push('css')


@endpush

@section('content')
<div class="container">

<div class="row profile">

    <div class="col-md-9">
            <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">الرئيسيه</a></li>
                    @if(isset($array) && !empty($array))
                        @foreach($array as $key=>$value)
                            <li>
                                <a href="{{ url('search/').'?'.$key.'='.$value }}">
                                    {{ trans('bu.'.$key) }}
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    @if($key=="bu_type")
                                        {{bu_type()[$value]}}
                                        @elseif($key=="bu_place")
                                        {{bu_place()[$value]}}
                                        @elseif($key=="bu_rent")
                                        {{bu_rent()[$value]}}
                                        @else
                                        {{$value}}
                                    @endif
                                    
                                </a>
                            </li>
                        @endforeach    
                    @endif
            </ol>
        <div class="profile-content">
            @include('website.bu.data',['buAll'=>$bus])
            <div class="text-center">
                {{ $bus->appends(Request::except('page'))->render() }}{{--to show pagination--}}
            </div>
        </div>
    </div>

    @include('website.bu.pages')
    

</div>

</div>

@push('js')
<script>
    $(document).ready(function(){

    });
</script>
@endpush

@endsection