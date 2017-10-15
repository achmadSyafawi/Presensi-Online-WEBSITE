@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
	    {!! Form::model($customer,['method' => 'PATCH','route'=>['admin.customer.update',$customer->id]]) !!}
	    <div class="row">
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::label('nama', 'Name:') !!}
			        {!! Form::text('nama',null,['class'=>'form-control']) !!}
		    	</div>
                 <div class="form-group">
			        {!! Form::label('no_telp', 'No Telp:') !!}
			        {!! Form::text('no_telp',null,['class'=>'form-control']) !!}
		    	</div>
	    	</div>
		    <div class="col-md-8 col-sm-12">
			    <div class="form-group">
			        {!! Form::label('alamat', 'Alamat:') !!}
			        {!! Form::textarea('alamat',null,['class'=>'form-control']) !!}
		    	</div>
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