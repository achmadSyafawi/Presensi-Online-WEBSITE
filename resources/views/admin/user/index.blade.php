@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Website User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="pull-right">
            <a href="{{ url('admin/user/create') }}" class="btn"><span class="fa fa-plus-circle fa-fw"></span> Add User</a>
        </div>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
         <table class="table table-striped table-bordered table-hover" id="data-table" style="font-size: 12px;">
             <thead>
             <tr class="bg-info">
                 <th>Id</th>
                 <th>Nama</th>
                 <th>Role</th>
                 <th width="15%">Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($user as $key => $row)
                 <tr>
                     <td>{{ $key+1 }}</td>
                     <td>{{ $row->name }}</td>
                     <td>{{ $row->role}}</td>
                     <td>
                         <!-- <a href="{{url('admin/user/edit',$row->id)}}" class="btn btn-xs btn-warning">Update</a> -->
                         <a href="{{url('admin/user/delete',$row->id)}}" class="btn btn-xs btn-danger">Delete</a>
                     </td>

                 </tr>
             @endforeach

             </tbody>

         </table>
    </div>
</div>
@endsection
