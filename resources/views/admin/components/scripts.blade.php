  {!! Html::script('learningAdminAssets/libs/jquery/jquery.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/bootstrap/js/bootstrap.bundle.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/metismenu/metisMenu.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/simplebar/simplebar.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/node-waves/waves.min.js') !!}

  <!-- Required datatable js -->
  {!! Html::script('learningAdminAssets/libs/datatables.net/js/jquery.dataTables.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') !!}
    
  <!-- Buttons examples -->
  {!! Html::script('learningAdminAssets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/jszip/jszip.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/pdfmake/build/pdfmake.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/pdfmake/build/vfs_fonts.js') !!}

  {!! Html::script('learningAdminAssets/libs/datatables.net-buttons/js/buttons.html5.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/datatables.net-buttons/js/buttons.print.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/datatables.net-buttons/js/buttons.colVis.min.js') !!}
  
  <!-- Responsive examples -->
  {!! Html::script('learningAdminAssets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') !!}
  
  {!! Html::script('learningAdminAssets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') !!}
 
  <!-- Datatable init js -->
  {!! Html::script('learningAdminAssets/js/pages/datatables.init.js') !!}
 
  <!-- Peity chart-->
  {!! Html::script('learningAdminAssets/libs/peity/jquery.peity.min.js') !!}

  <!--C3 Chart-->
  {!! Html::script('learningAdminAssets/libs/d3/d3.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/c3/c3.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/jquery-knob/jquery.knob.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}

  {!! Html::script('learningAdminAssets/js/pages/dashboard.init.js') !!}

  <!-- Summernote js -->
  {!! Html::script('learningAdminAssets/libs/summernote/summernote-bs4.min.js') !!}

  <!-- init js -->
  {!! Html::script('learningAdminAssets/js/pages/summernote.init.js') !!}

  <!-- Sweet Alert -->
  {!! Html::script('learningAdminAssets/sweetalert/sweetalert.min.js') !!}

  {!! Html::script('learningAdminAssets/js/pages/learning.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/select2/js/select2.min.js') !!}
 
  {!! Html::script('learningAdminAssets/js/pages/ecommerce-select2.init.js') !!}

  {!! Html::script('learningAdminAssets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}

  {!! Html::script('learningAdminAssets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') !!}

  <!-- form mask -->
  {!! Html::script('learningAdminAssets/libs/inputmask/min/jquery.inputmask.bundle.min.js') !!}

  {!! Html::script('learningAdminAssets/ckeditor/ckeditor.js') !!}
  
  <script type="text/javascript">
    CKEDITOR.replace( 'textCkeditor', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );

  </script>
  
  <!-- form mask init -->
  {!! Html::script('learningAdminAssets/js/pages/form-mask.init.js') !!}

  {!! Html::script('learningAdminAssets/js/pages/form-advanced.init.js') !!}

  {!! Html::script('learningAdminAssets/js/app.js') !!}

 