@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Presensi Baru</h1>
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
                 <th>waktu</th>
                 <th>Foto</th>
                 <th>Absen type</th>
                 <!--<th>Ijin</th>-->
                 <th>Lokasi</th>
                 <th>Status</th>
                 <th width = "35%" style="text-align:center;" >Actions</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($absensi as $key => $row)
			 <tr>
			      <td>{{ $key+1 }}</td>
                  <td>{{ $row->nidn }}</td>
                  <td>{{ $row->Pegawai->name}}</td>
				  <td>{{ $row->tgl }}</td>
				  <td>{{ $row->waktu }}</td>
                  <td><img width="50" height="50" src="{{ url('http://localhost:3000/public/'.$row->foto)}}"></td>
                  @if($row->type == 1)
                  <td>Masuk</td>
                  @else 
                  <td>Keluar</td>
                  @endif
                  <td>{{ $row->Place->name }}</td>
                  @if($row->status == 0)
                  <td>Absensi Baru</td>
                  @else
                  <td>Absensi Valid</td>
                  @endif
				  <td>
                    <a href="{{url('admin/absensi/accept',$row->id)}}" class="btn btn-xs btn-primary" n>Diterima</a>
                    <a href="{{url('admin/absensi/decline',$row->id)}}" class="btn btn-xs btn-warning">Tidak di Terima</a>
                    <!-- <a href="{{url('admin/absensi_detail/edit',$row->id)}}" class="btn btn-xs btn-warning">Tambah Detail</a>
				    <a href="{{url('admin/absensi_detail',$row->id)}}" class="btn btn-xs btn-primary">Detail absensi</a>
                    <a href="{{url('admin/absensi/delete',$row->id)}}" class="btn btn-xs btn-danger">Delete</a>
                    <a href="{{url('admin/absensi/invoice',$row->id)}}"><i class="fa fa-wpforms fa-lg"></i></a> -->
                </td>
			</tr>
		    @endforeach

             </tbody>

         </table>
         
    </div>
</div>

@endsection