@extends('admin.layouts.app')

@section('headerSection')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Category</h3>
          <a class="col-lg-offset-5 btn btn-success" href="{{ route('category.create')}}">Add New Category</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S No</th>
                  <th>Category Name</th>
                  <th>Slug </th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($categories as $cat)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$cat->name}}</td>
                      <td>{{$cat->slug}}</td>
                      <td><a href="{{ route('category.edit',$cat->id)}}"><i class="fa fa-fw fa-edit"></i></a></td>
                      <td>
                        <form id="cat-delete-form-{{$cat->id}}" action="{{ route('category.destroy',$cat->id)}}" method="post" style="display: none" >
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        </form>
                        <a href="#" onclick="if(confirm('Do You Want To Delete')){
                           
                           event.preventDefault();
                           document.getElementById('cat-delete-form-{{$cat->id}}').submit();

                        }else{
                          event.preventDefault();
                        }"><i class="fa fa-fw fa-trash"></i></a></td>
                    </tr>
                  @endforeach
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>S No</th>
                  <th>Tag Name</th>
                  <th>Slug </th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footerSection')
 <script src="{{ asset('/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{ asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

 <script>
  $(function () {

    
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection