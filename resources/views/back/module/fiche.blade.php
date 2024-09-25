@extends('back.index')
@section('containt')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header sty-one">
      <h1 class="text-black">modules</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> modules</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">enregistrement <a href="{{route('module.index')}}" class="btn btn-success">Lister</a></h5>
            </div>
<div class="info-box">
      <h4 class="text-black">Data Table</h4>
      <p>Data Table With Full Features</p>
      <div class="table-responsive">
          <ul>
            <li>nom_module: {{$modules->nom_module}}</li>
            <li>diminutif: {{$modules->diminutif}}</li>
            <li>detail: {{$modules->detail}}</li>
          </ul>
      </div>
      </div>
      </div>
      </div>
      </div>
@endsection