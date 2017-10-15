@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tambah User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- /.row -->
<div class="row">
    <!-- /.col-lg-8 -->
    <div class="col-lg-12">
	    {!! Form::open(['url' => 'admin/user/create']) !!}
	    <div class="row">
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
        </div>
      </div>
	    <div class="row">
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::label('name', 'Nama:') !!}
			        {!! Form::text('name',null,['class'=>'form-control']) !!}
		    	</div>
          <div class="form-group">
			        {!! Form::label('email', 'Email:') !!}
			        {!! Form::text('email',null,['class'=>'form-control']) !!}
		    	</div>
          <div class="form-group">
			        {!! Form::label('Username:') !!}
			        {!! Form::text('username',null,['class'=>'form-control'],'required') !!}
		    	</div>
	    	</div>
      </div>
      <div class="row">
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::label('password', 'Password:') !!}
			        {!! Form::input('password','password',null,['class'=>'form-control']) !!}
		    	</div>
	    	</div>
      </div>
      <div class="row">
        <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::label('role', 'Role:') !!}
			        <select id="role" name="role" class="form-control">
                <option value="">-</option>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
              </select>
		    	</div>
	    	</div>
      </div>
      <div class="row">
		    <div class="col-md-5">
			    <div class="form-group">
			        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			    </div>
		    </div>
	    </div>
	    {!! Form::close() !!}
    </div>
</div>
@stop
