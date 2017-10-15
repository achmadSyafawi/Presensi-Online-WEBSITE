@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Presensi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
         <table class="table table-striped table-bordered table-hover" id="data-table" style="font-size: 12px;">
             <thead>
             <tr class="bg-info">
                 <th>Id</th>
                 <th>NIDN</th>
                 <th>Nama</th>
                 <th>Tanggal</th>
                 <th>Masuk</th>
                 <th>Foto Masuk</th>
                 <th>Keluar</th>
                 <!--<th>Ijin</th>-->
                 <th>Foto Keluar</th>
                 <th>Lokasi</th>
                 <th width = "35%" style="text-align:center;" >Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($absensi as $key => $row)
			 <tr>
			      <td>{{ $key+1 }}</td>
                  <td>{{ $row->nidn }}</td>
                  <td>{{ $row->name}}</td>
				  <td>{{ $row->tgl }}</td>
				  <td>{{ $row->jam_masuk }}</td>
                  <td><img width="50" height="50" src="{{ url('http://localhost:3000/public/'.$row->foto_masuk)}}"></td>
                  <td>{{ $row->jam_keluar }}</td>
                  <td><img width="50" height="50" src="{{ url('http://localhost:3000/public/'.$row->foto_keluar)}}"></td>
                  <td>{{ $row->lokasi }}</td>
				  <td>
                    <a href="{{url('admin/absensi',$row->id)}}" class="btn btn-xs btn-warning">Detail Presensi</a>
                    <a href="{{url('admin/report',$row->id)}}" class="btn btn-xs btn-primary">Report</a>
                </td>
			</tr>
		    @endforeach

             </tbody>

         </table>
         
    </div>
</div>

@endsection