@extends('back/index')
@section('containt')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header sty-one">
      <h1 class="text-black">Users</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Formulaire</li>
        <li><i class="fa fa-angle-right"></i> users</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Listes des users <a href="{{route('user.create')}}" class="btn btn-success">ajouter</a></h5>
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
                  <th>name</th>
                  <th>email</th>
                  <th>Date enregistrement</th>
                  <th>Date modif</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <td>{{$user-> name}}</td>
                    <td>{{$user-> email}}</td>
                    <td>{{$user-> created_at}}</td>
                    <td>{{$user-> updated_at}}</td>
                    <td>
                      
                    <a href="{{route('user.show', $user->id)}}" class="btn btn-success"> <i class="fa fa-eye"> </i> </a>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"> <i class=" fa fa-edit"> </i> </a>
                    <form id="destroy{{$user->id}}" action="{{route('user.destroy', $user->id)}}" method="post">
                      @csrf 
                      @method('DELETE')
                      <button href="" class="btn btn-danger" id="delete" onSubmit="return confirm('Confirmez vous la supression ???')"> <i class="fa fa-trash">  </i> </button>
                    </form>
                    @if($user->etat==0)
                    <a href="{{route('user.state', $user->id, 'id={$user->id}' )}}" class="fa fa-thumbs-down btn btn-danger"> </a>
                    @elseif($user-> etat==1)
                    <a href="{{route('user.state', $user->id, 'id={$user->id}' )}}" class="fa fa-thumbs-up btn btn-success"> </a>
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