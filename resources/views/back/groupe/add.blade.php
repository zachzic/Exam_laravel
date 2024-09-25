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
            <h5 class="text-white m-b-0">ENREGISTREMENT   <a href="{{route('groupe.index')}}" class="btn btn-success">Lister</a></h5>
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
            <form action="{{route('groupe.store')}}" method="POST">
              @csrf   
              <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="exampleInputuname" placeholder="nom" name="nom_groupe">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">diminutif</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Diminutif" name="diminutif">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Description" name="description">
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