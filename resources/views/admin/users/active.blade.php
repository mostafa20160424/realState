<tr>
    <td><a href="{{url('admin/bus/'.$bu->id.'/edit')}}">{{ $bu->bu_name }}</a></td>
    <td>{{ $bu->bu_price }}</td>
    <td>{{ bu_type()[$bu->bu_type] }}</td>
    <td>{{ $bu->bu_square }}</td>
        <td>
                {{ $bu->created_at }}
        </td>
         <td>
            {!! Form::open(['route'=>['active_bu',$bu->id],'method'=>'POST','class'=>"bu_active"]) !!}
                <form action="{{ url('admin/bus/active/'.$bu->id) }}" method='POST' class='bu_active'>
                <input type='hidden' name='bu_status' value="{{ $bu->bu_status==0?1:0 }}">
                    @if($bu->bu_status==1)
                        <button name='submit' class='btn btn-danger'  type='submit'>
                                <i class='fa fa-close '></i>
                            </button>
                    
                    @else
                        <button name='submit' class='btn btn-success'  type='submit'>
                                <i class='fa fa-check-circle-o fa-2x'></i>
                        </button>
                    @endif
            {!! Form::close() !!}
        </td>
</tr>

