@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Data Pegawai</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
	    {!! Form::model($pegawai,['method' => 'PATCH','route'=>['admin.pegawai.update',$pegawai->nidn]]) !!}
		
	    <div class="row">
		    <div class="col-md-5">
			    			<!--start formgroup-->
			    <div class="form-group">
			        {!! Form::label('nidn', 'NIDN:') !!}
			        {!! Form::text('nidn',null,['class'=>'form-control','required','readonly']) !!}
		    	</div>
				<div class="row">
                    <div class="form-group col-md-12 col-sm-12 ">
                        {!! Form::label('name', 'Nama:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                    </div>
            	</div>
				<div class="row">
                    <div class="form-group col-md-12 col-sm-12">
                        {!! Form::label('pangkat', 'Pangkat:') !!}
                        {!! Form::text('pangkat', null, ['class'=>'form-control','required']) !!}
                    </div>
            	</div>
				<div class="row">
                    <div class="form-group col-md-12 col-sm-12">
                        {!! Form::label('jabatan', 'Jabatan:') !!}
                        {!! Form::text('jabatan', null, ['class'=>'form-control','required']) !!}
                    </div>
            	</div>
				<div class="row">
                    <div class="form-group col-md-12 col-sm-12">
                        {!! Form::label('program_studi', 'Program Studi:') !!}
                        {!! Form::text('program_studi', null, ['class'=>'form-control','required']) !!}
                    </div>
            	</div>	
		    <div class="row">
                <div class="form-group col-md-12 com-sm-12">
			        {!! Form::label('password', 'Password:') !!}
			        {!! Form::input('password','password',null,['class'=>'form-control']) !!}
		    	</div>
				<!--end formgroup-->
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
	    	</div>
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			    </div>
		    </div>
	    </div>
	    {!! Form::close() !!}
    </div>
</div>
@stop