@extends('admin/index')
@section('containt')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
						<li class="breadcrumb-item active"><a href="{{route('Partenaire.create')}}" >ajouter</a></li>
					</ol>
                </div>
                <!-- row -->

                <div class="row">
                    
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Exam Toppers</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Nom partenaire</th>
                                                <th>Mots du partenaire</th>
                                                <th>Admin</th>
                                                <th>Date de création</th>
                                                <th>Date de modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Partenaires as $Partenaire)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('./upload/Partenaire/'.$Partenaire->image)}}" 
                                                        class="rounded-lg mr-2" width="90" height="90" alt=""/> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Partenaire-> nom_partenaire}} </span>
                                                    </div>
                                                </td>

                                                <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="w-space-no">{{ substr($Partenaire->mots_partenaire, 0, 30) }}</span>
                                                </div>
                                            </td>

                                                
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Partenaire-> admin? $Partenaire->admin->name:''}}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Partenaire-> created_at}}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Partenaire-> updated_at}}</span>
                                                    </div>
                                                </td>

                                                <td>
													<div class="d-flex">
                                                        <a href="{{route('Partenaire.show', $Partenaire->id)}}" class="btn btn-success"> <i class="fa fa-eye"> </i> </a>
                                                        <a href="{{route('Partenaire.edit', $Partenaire->id)}}" class="btn btn-primary"> <i class=" fa fa-edit"> </i> </a>
                                                        <form id="destroy{{$Partenaire->id}}" action="{{route('Partenaire.destroy', $Partenaire->id)}}" method="post">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button href="" class="btn btn-danger" id="delete" onSubmit="return confirm('Confirmez vous la supression ???')"> <i class="fa fa-trash">  </i> </button>
                                                        </form>
                                                        @if($Partenaire->etat==0)
                                                        <a href="{{route('Partenaire.state', $Partenaire->id, 'id={$Partenaire->id}' )}}" class="fa fa-thumbs-down btn btn-danger"> </a>
                                                        @elseif($Partenaire-> etat==1)
                                                        <a href="{{route('Partenaire.state', $Partenaire->id, 'id={$Partenaire->id}' )}}" class="fa fa-thumbs-up btn btn-success"> </a>
                                                        @endif
                                                    </div>
												</td>
                                            </tr>
                                        @endforeach    
                                        </tbody>
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