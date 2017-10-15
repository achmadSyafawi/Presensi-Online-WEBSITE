@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pegawai</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="pull-right">
            <a href="{{ url('admin/pegawai/create') }}" class="btn"><span class="fa fa-plus-circle fa-fw"></span> Add Data</a>
        </div>
        <!--<div class="pull-right">
            <a href="{{ url('admin/paket_detail') }}" class="btn"><span class="fa fa-plus-square fa-fw"></span> Add Detail Paket</a>
        </div>-->
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
         <table class="table table-striped table-bordered table-hover" id="data-table" style="font-size: 12px;">
             <thead>
             <tr class="bg-info">
                 <th>nidn</th>
                 <th>Name</th>
                 <th>Pangkat</th>
                 <th>Jabatan</th>
                 <th>Program Studi</th>
                 <th width="25%">Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($pegawai as $row )
                 <tr>
                     <td>{{ $row->nidn }}</td>
                     <td>{{ $row->name }}</td>
                     <td>{{ $row->pangkat}}</td>
                     <td>{{ $row->jabatan }}</td>
                     <td>{{ $row->program_studi}}</td>
                     <td>
                         <a href="{{url('admin/pegawai/edit',$row->nidn)}}" class="btn btn-xs btn-warning">Update</a>
                         <a href="{{url('admin/pegawai/delete',$row->nidn)}}" class="btn btn-xs btn-danger">Delete</a>
                     </td>
                    
                 </tr>
             @endforeach

             </tbody>

         </table>
    </div>
</div>
@endsection