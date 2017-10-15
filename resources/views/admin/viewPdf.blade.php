@extends('admin/template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manual Book</h1>
    </div>
</div>
<div class="row">
            <a href="{{ url('public/assets/help.pdf')}}" target="_blank" class="btn" style="float:right;"><span class="fa fa-binoculars fa-fw"></span> Open In New Tab</a>
    <div class="col-lg-12">
         <iframe src="{{ url('public/assets/help.pdf')}}" style="width:100% ;height:75%;" frameborder="0"></iframe>
    </div>
</div>
@endsection





<!--iki PHP
  $file = 'test.pdf';
  $filename = 'test.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);-->