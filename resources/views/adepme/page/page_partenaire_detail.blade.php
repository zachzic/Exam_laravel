@extends('adepme.index')
@section('containt')
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="main_sec_all">
                <div class="partner-top-sec">
                    <div class="wrapper">
                        <div class="heading_partner">
                            <h2>{{$partenaires->nom_partenaire}}</h2>
                        </div>
                    </div>
                </div>
                <div class="services-offerts">
                    <div class="left_img_ser left_img_pro">
                        <img src="{{asset('./upload/Partenaire/'.$partenaires->image)}}" width="350" height="150" alt="map">
                    </div>
                    <div class="wrapper">
                        <div class="map_right_des pro_des partner_lis">
                            <p>{{$partenaires->mots_partenaire}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
	</div>
</div>
@endsection