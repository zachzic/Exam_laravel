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
                                <h4 class="card-title">Formulaire d'ajout <a href="{{route('Programme.index')}}" >Lister</a></h4>
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
                                    <form class="form-valide-with-icon" action="{{route('Programme.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Nom Programme</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="nom Programme" name="nom_programme">
                                            </div>
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Description</label>
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Description" name="description"></textarea>
                                            </div>
                                        </div>


                                        <div class="input-group mb-3 input-primary">
                                            <label class="text-label">Partenaire</label>
                                            <div class="input-group">
                                                <select type="text" class="form-control"  name="partenaire_ids[]" multiple>
                                                    @foreach($Partenaires as $Partenaire)
                                                    <option value="{{$Partenaire->id}}">{{$Partenaire->nom_partenaire}}</option>
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