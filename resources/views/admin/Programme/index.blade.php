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
						<li class="breadcrumb-item active"><a href="{{route('Programme.create')}}" >ajouter</a></li>
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
                                                <th>Nom Programme</th>
                                                <th>Description</th>
                                                <th>Partenaires</th>
                                                <th>Date de création</th>
                                                <th>Date de modification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Programmes as $Programme)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('./upload/Programme/'.$Programme->image)}}" 
                                                        class="rounded-lg mr-2" width="90" height="90" alt=""/> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Programme-> nom_programme}} </span>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{ substr ($Programme-> description, 0, 30)}} </span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($Programme->Partenaire)
                                                            @foreach ($Programme->Partenaire as $partenaire)
                                                                <span class="w-space-no">"{{ $partenaire->nom_partenaire }}" </span>
                                                            @endforeach
                                                        @else
                                                            <span class="w-space-no">Aucun partenaire</span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Programme-> created_at}}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="w-space-no">{{$Programme-> updated_at}}</span>
                                                    </div>
                                                </td>

                                                <td>
													<div class="d-flex">
                                                        <a href="{{route('Programme.show', $Programme->id)}}" class="btn btn-success"> <i class="fa fa-eye"> </i> </a>
                                                        <a href="{{route('Programme.edit', $Programme->id)}}" class="btn btn-primary"> <i class=" fa fa-edit"> </i> </a>
                                                        <form id="destroy{{$Programme->id}}" action="{{route('Programme.destroy', $Programme->id)}}" method="post">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button href="" class="btn btn-danger" id="delete" onSubmit="return confirm('Confirmez vous la supression ???')"> <i class="fa fa-trash">  </i> </button>
                                                        </form>
                                                        @if($Programme->etat==0)
                                                        <a href="{{route('Programme.state', $Programme->id, 'id={$Programme->id}' )}}" class="fa fa-thumbs-down btn btn-danger"> </a>
                                                        @elseif($Programme-> etat==1)
                                                        <a href="{{route('Programme.state', $Programme->id, 'id={$Programme->id}' )}}" class="fa fa-thumbs-up btn btn-success"> </a>
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