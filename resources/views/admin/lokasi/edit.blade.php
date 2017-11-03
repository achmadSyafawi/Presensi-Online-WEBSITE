@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Lokasi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
	    {!! Form::model($lokasi,['method' => 'PATCH','route'=>['admin.lokasi.update',$lokasi->id]]) !!}
	    <div class="row">
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::label('name', 'Name:') !!}
			        {!! Form::text('name',null,['class'=>'form-control']) !!}
		    	</div>
	    	</div>
		    <div class="col-md-8 col-sm-12">
			    <div class="form-group">
			        {!! Form::label('longi', 'Longitute:') !!}
			        {!! Form::text('longi',null,['class'=>'form-control','required']) !!}
		    	</div>
	    	</div>
			<div class="col-md-8 col-sm-12">
			    <div class="form-group">
			        {!! Form::label('lati', 'Latitude:') !!}
			        {!! Form::text('lati',null,['class'=>'form-control','required']) !!}
		    	</div>
	    	</div>
		    <div class="col-md-5">
			@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			    <div class="form-group">
			        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			    </div>
		    </div>
	    </div>
	    {!! Form::close() !!}
    </div>
</div>
@stop