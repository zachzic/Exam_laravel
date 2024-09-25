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
						<li class="breadcrumb-item active"><a href="{{route('Programme.index')}}" >Lister</a></li>
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
                               
                                <div class="profile-blog mb-5">
                                    <li><h5 class="text-primary d-inline">Nom Programme: {{$Programmes->nom_Programme}}</h5></li>
                                    <li><h5 class="text-primary d-inline">Description: {{$Programmes->description}}</h5></li>
                                    <li><h5 class="mb-0">Partenaires:@foreach($Partenaires as $Partenaire)
                                                                     <li>-{{$Partenaire->nom_partenaire}}</li>
                                                                     @endforeach</h5></li>
                                    <li><img src="{{ asset('./upload/Programme/'.$Programmes->image) }}" width="150" height="200"></li>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
@endsection        