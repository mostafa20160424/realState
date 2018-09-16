@extends('admin.layouts.layout')

@push('css')

{!! Html::style('adminlit/plugins/datatables/dataTables.bootstrap.css') !!}

@endpush

@section('title')

الاعضاء

@endsection

@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>
                التحكم فى الاعضاء
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Tables</a></li>
                  <li class="active">Data tables</li>
                </ol>
            </section>
      
              <!-- Main content -->
              <section class="content">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                          <div class="box-body">
                            <div class="table-responsive">           
                            <table id="data" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>الاسم</th>
                                  <th>البريد الالكترونى</th>
                                  <th> الصلاحيات</th>
                                  <th> عقارات العضو</th>
                                  <th>وقت الانشاء</th>
                                  <th>وقت التحديث</th>
                                  <th>التحكم</th>
                                </tr>
                              </thead>

                              <tfoot>
                                  <tr>                              
                                    <th>الاسم</th>
                                    <th>البريد الالكترونى</th>
                                    <th> الصلاحيات</th>
                                    <th> عقارات العضو</th>
                                    <th>وقت الانشاء</th>
                                    <th>وقت التحديث</th>
                                    <th>التحكم</th>                                  
                                  </tr>
                                </tfoot>
                            </table>
                            </div><!-- /.table-responsive -->                        
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->

                  </div><!-- /.col -->
                </div><!-- /.row -->
              </section><!-- /.content -->

              
@endsection

@push('js')

{!! Html::script('adminlit/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('adminlit/plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>

        $(function () {

            var lastIdx = null;
            
              $('#data thead th').each( function () {
                  if($(this).index()  < 5 && $(this).index()!=2 ){
                      var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                      var title = $(this).html();
                      $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
                  }else if($(this).index() == 2){
                      $(this).html( `<select >
                                        <option value=""> الكل </option>
                                        <option value="عضو"> عضو </option>
                                        <option value="مدير الموقع"> مدير الموقع </option>
                                     </select>`);
                  }
            
              } );
            
              var table = $('#data').DataTable({
                  processing: true,//loading before show table
                  serverSide: true,
                  ajax: '{{ url('admin/users/data/') }}',
                  columns: [
                      {data: 'name', name: 'name'},
                      {data: 'email', name: 'email'},
                      {data: 'admin', name: 'admin'},
                      {data: 'my_bu', name: 'ss'},
                      {data: 'created_at', name: 'created_at'},
                      {data: 'updated_at', name: 'updated_at'},
                      {data: 'control', name: ''}
                  ],
                  "language": {
                      "url": "{{ Request::root()  }}/adminlit/cus/Arabic.json"
                  },
                  "stateSave": false,
                  "responsive": true,
                  "order": [[0, 'desc']],
                  "pagingType": "full_numbers",
                  aLengthMenu: [
                      [25, 50, 100, 200, -1],
                      [25, 50, 100, 200, "All"]
                  ],
                  iDisplayLength: 25,
                  fixedHeader: true,
            
                  "oTableTools": {
                      "aButtons": [
            
            
                          {
                              "sExtends": "csv",
                              "sButtonText": "ملف اكسل",
                              "sCharSet": "utf16le"
                          },
                          {
                              "sExtends": "copy",
                              "sButtonText": "نسخ المعلومات",
                          },
                          {
                              "sExtends": "print",
                              "sButtonText": "طباعة",
                              "mColumns": "visible",
            
            
                          }
                      ],
            
                      "sSwfPath": "{{ Request::root()  }}/adminlit/cus/copy_csv_xls_pdf.swf"
                  },
            
                  "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
                  ,initComplete: function ()
                  {
                      var r = $('#data tfoot tr');
                      r.find('th').each(function(){
                          $(this).css('padding', 8);
                      });
                      $('#data thead').append(r);
                      $('#search_0').css('text-align', 'center');
                  }
            
              });
            
              table.columns().eq(0).each(function(colIdx) {
                  $('input', table.column(colIdx).header()).on('keyup change', function() {
                      table
                              .column(colIdx)
                              .search(this.value)
                              .draw();
                  });
            
            
            
            
              });
            
            
            
              table.columns().eq(0).each(function(colIdx) {
                  $('select', table.column(colIdx).header()).on('change', function() {
                      table
                              .column(colIdx)
                              .search(this.value)
                              .draw();
                  });
            
                  $('select', table.column(colIdx).header()).on('click', function(e) {
                      e.stopPropagation();
                  });
              });
            
            
              $('#data tbody')
                      .on( 'mouseover', 'td', function () {
                          var colIdx = table.cell(this).index().column;
            
                          if ( colIdx !== lastIdx ) {
                              $( table.cells().nodes() ).removeClass( 'highlight' );
                              $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                          }
                      } )
                      .on( 'mouseleave', function () {
                          $( table.cells().nodes() ).removeClass( 'highlight' );
                      } );


            
          });


</script>
@endpush
