@extends('back/index')
@section('containt')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header sty-one">
      <h1 class="text-black">acces</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Formulaire</li>
        <li><i class="fa fa-angle-right"></i> access</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Listes des access <a href="{{route('acces.create')}}" class="btn btn-success">ajouter</a></h5>
            </div>
<div class="info-box">
      <h4 class="text-black">Data Table</h4>
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

      <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id_module</th>
                  <th>id_groupe</th>
                  <th>Date enregistrement</th>
                  <th>Date modif</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($access as $acces)
                    
                    <tr>
                      <td>{{$acces->module? $acces->module->nom_module:''}}</td>
                      <td>{{$acces->groupe? $acces->groupe->nom_groupe:''}}</td>
                      <td>{{$acces-> created_at}}</td>
                      <td>{{$acces-> updated_at}}</td>
                      <td>
                        
                      <a href="{{route('acces.show', $acces->id)}}" class="btn btn-success"> <i class="fa fa-eye"> </i> </a>
                      <a href="{{route('acces.edit', $acces->id)}}" class="btn btn-primary"> <i class=" fa fa-edit"> </i> </a>
                      <form id="destroy{{$acces->id}}" action="{{route('acces.destroy', $acces->id)}}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button href="" class="btn btn-danger" id="delete" onSubmit="return confirm('Confirmez vous la supression ???')"> <i class="fa fa-trash">  </i> </button>
                      </form>
                      @if($acces->etat==0)
                      <a href="{{route('acces.state', $acces->id, 'id={$acces->id}' )}}" class="fa fa-thumbs-down btn btn-danger"> </a>
                      @elseif($acces-> etat==1)
                      <a href="{{route('acces.state', $acces->id, 'id={$acces->id}' )}}" class="fa fa-thumbs-up btn btn-success"> </a>
                      @endif
                    </td>
                </tr>
               
                @endforeach
                
                
                <tbody>
             </table>
                  </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <script>
      function confirmer()
      {
        if(confirm("confirmer vous la suppression"))
        return true;
        else return false;
      }
      </script>
      @endsection