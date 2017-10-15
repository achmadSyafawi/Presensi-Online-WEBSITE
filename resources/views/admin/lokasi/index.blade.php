@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lokasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="pull-right">
            <a href="{{ url('admin/lokasi/create') }}" class="btn"><span class="fa fa-plus-circle fa-fw"></span> Add Data</a>
        </div>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
         <table class="table table-striped table-bordered table-hover" id="data-table" style="font-size: 12px;">
             <thead>
             <tr class="bg-info">
                 <th>Id</th>
                 <th>Name</th>
                 <th>Longitute</th>
                 <th width="35%">Latitude</th>
                 <th width="15%">Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($lokasi as $place)
                 <tr>
                     <td>{{ $place->id }}</td>
                     <td>{{ $place->name }}</td>
                     <td>{{ $place->longi }}</td>
                     <td>{{ $place->lati }}</td>
                     <td>
                         <a href="{{url('admin/lokasi/edit',$place->id)}}" class="btn btn-xs btn-warning">Update</a>
                         <a href="{{url('admin/lokasi/delete',$place->id)}}" class="btn btn-xs btn-danger">Delete</a>
                     </td>
                    
                 </tr>
             @endforeach

             </tbody>

         </table>
    </div>
</div>
@endsection