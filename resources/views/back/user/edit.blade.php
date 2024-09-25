@extends('back.index')
@section('containt')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Ajouts de module</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Formulaire d'inscription</li>
        <li><i class="fa fa-angle-right"></i> Module</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">ENREGISTREMENT   <a href="{{route('module.index')}}" class="btn btn-success">Lister</a></h5>
            </div>
            <div class="card-body">
            <div class="row">
              
              <div class="col-md-12">

                @if(session()->has('message'))
                  <div class="alert alert-icon alert-success">
                    {{session('message')}}
                  </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-icon alert-danger">
                          {{session('error')}}
                        </div>
                    @endforeach
                @endif
              </div>
            </div>  
            <form action="{{route('module.update',$modules->id)}}" method="POST">
              @csrf   
              @method ('put')
              <div class="form-group">
                <label for="exampleInputEmail1">id</label>
                <input type="hidden" class="form-control"  value="{{$modules->id}}" name="id">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nom_module</label>
                <input type="text" class="form-control" id="exampleInputuname" value="{{$modules->nom_module}}" name="nom_module">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Diminutif</label>
                <input type="text" class="form-control" id="exampleInputuname" value="{{$modules->diminutif}}" name="diminutif">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Details</label>
                <input type="text" class="form-control" id="exampleInputuname" value="{{$modules->detail}}" name="detail">
              </div>
              
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Check me out </label>
              </div>
              <button type="submit" class="btn btn-success">Envoyer</button>
            </form>
            </div>
          </div>
        </div>
      </div> 
      @endsection