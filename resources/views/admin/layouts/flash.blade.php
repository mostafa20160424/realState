
@push('css')

{!!Html::style('adminlit/dist/css/sweetalert2.min.css')!!}
@endpush

@push('js')
{!!Html::script('adminlit/dist/js/sweetalert2.min.js')!!}
<script>
    swal({
        position: 'center',
        type: 'success',
        title:"{{session()->has('flash_message')?session('flash_message'):session('success')}}",
        showConfirmButton: false,
        timer: 2000
      })
</script>



@endpush