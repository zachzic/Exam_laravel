<?php
	use App\Models\Partenaire;
	$partenaires= Partenaire::where('etat', 1)->get();
?>
@extends('adepme.index')
@section('containt')
<div class="main_sec_all">
    <div class="wrapper">
            <div class="just_heading just_heading_set">
                
                <h2>Nos partenaires</h2>
                <p></p>
            </div>
            <div class="partenaires_sec">
                <ul>
                    @foreach($partenaires as $partenaire)
                    <li>
                        <div class="outer_box">
                            <a href="#"><img width="122" height="89" src="{{asset('./upload/Partenaire/'.$partenaire->image )}}" 
                                class="attachment-full size-full wp-post-image" alt="image description" decoding="async" 
                                loading="lazy" sizes="100vw" />
                            </a>
                            <h3>{{$partenaire->nom_partenaire}}</h3>
                                <a href="{{route('page.part.detail',['id' => $partenaire->id])}}">En savoir plus</a>
                        </div>
                    </li>
                    @endforeach
                </ul>    
            </div>
    </div>
</div>

@endsection