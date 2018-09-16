{!! Html::link(url('/admin/users/' . $model->id . '/edit')
,'<i class="fa fa-edit"></i></a>'
, ['class'=>"btn btn-info btn-circle"])!!}
<a href="{{url('/admin/users/' . $model->id . '/delete')}}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>