@extends('back.index')
@section('containt')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Ajouts de groupes</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Formulaire d'inscription</li>
        <li><i class="fa fa-angle-right"></i> Étudiants</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">ENREGISTREMENT   <a href="{{route('acces.index')}}" class="btn btn-success">Lister</a></h5>
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
            <form action="{{route('acces.store')}}" method="POST" enctype="multipart/form-data">
              @csrf   
              <div class="form-group">
                <label for="exampleInputEmail1">module</label>
                <select ype="text" class="form-control" id="exampleInputuname"  name="id_module">
                  @foreach($modules as $module)
                  <option value="{{$module->id}}">{{$module->nom_module}}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">groupe</label>
                <select type="text" class="form-control" id="exampleInputEmail1"  name="id_groupe">
                @foreach($groupes as $groupe)
                  <option value="{{$groupe->id}}">{{$groupe->id}}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Check me out </label>
              </div>
              <button type="submit" class="btn btn-success">Envoyer</button>
              <button type="reset" class="btn btn-success"> Effacer</button>
            </form>
            </div>
          </div>
        </div>
      </div> 
      @endsection