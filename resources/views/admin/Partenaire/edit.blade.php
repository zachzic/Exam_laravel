@extends('admin.index')
@section('containt')
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Formulaire de mise à jour <a href="{{route('Partenaire.index')}}" >Lister</a></h4>
                            </div>
                            <div class="alert-dismissible fade show">

                                @if(session()->has('message'))
                                <div class="alert alert-success solid alert-dismissible fade show">
                                    {{session('message')}}
                                </div>
                                @endif

                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-warning solid alert-dismissible fade show">
                                        {{session('error')}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3 input-primary">
                                    <form class="form-valide-with-icon" action="{{route('Partenaire.update', $Partenaires->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf   
                                        @method ('put')
                                        
                                        <div class="input-group mb-3 input-primary">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" value="{{$Partenaires->id}}" name="id">
                                            </div>
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Nom partenaire</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{$Partenaires->nom_partenaire}}" name="nom_partenaire">
                                            </div>
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Admin</label>
                                            <div class="input-group">
                                                <select type="text" class="form-control"  name="admin_id">
                                                    @foreach($admins as $admin)
                                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Image</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control"  name="image">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-light">cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection