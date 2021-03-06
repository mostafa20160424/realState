@extends('admin.layouts.layout')

@push('css')

{!! Html::style('adminlit/plugins/datatables/dataTables.bootstrap.css') !!}

@endpush

@section('title')

العقارات

@endsection

@section('content')

    @if(session()->has('flash_message'))
        @include('admin.layouts.flash')
    @endif

        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>
                التحكم فى العقارات
                </h1>
            </section>
      
              <!-- Main content -->
              <section class="content">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                          <div class="box-body">
                            <table id="data" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                    <th>اسم المرسل</th>
                                    <th> البريد الاكترونى</th>
                                    <th> نوع المرسل</th>
                                    <th> عنوان الموضوع</th>                                  
                                    <th>تمت الروئيه</th>
                                    <th>تاريخ الارسال</th>
                                    <th>التحكم</th>  
                                </tr>
                              </thead>

                          
                              <tfoot>
                                  <tr>                              
                                    <th>اسم المرسل</th>
                                    <th> البريد الاكترونى</th>
                                    <th> نوع المرسل</th>
                                    <th> عنوان الموضوع</th>                                  
                                    <th>تمت الروئيه</th>
                                    <th>تاريخ الارسال</th>
                                    <th>التحكم</th>                               
                                  </tr>
                                </tfoot>
                            </table>
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

    function run()
    {
        return confirm(`Are you Sure`);
    }
        $(function () {


            var lastIdx = null;
            
              $('#data thead th').each( function () {
                if($(this).index()  < 4 ){
                    
                      var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                      var title = $(this).html();
                      $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
                }
            
              } );
            
              var table = $('#data').DataTable({
                  processing: true,//loading before show table
                  serverSide: true,
                  ajax: '{{ url('admin/contact/data') }}',
                  columns: [
                      {data: 'name', name: 'name'},
                      {data: 'email', name: 'email'},
                      {data:'contact_type',name:'contact_type'},
                      {data: 'subject', name: 'subject'},
                      {data: 'view', name: 'view'},
                      {data: 'created_at', name: 'created_at'},
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
