@extends('adepme.index')
@section('containt')
<div class="main_sec_all">
    <div class="wrapper">
        <div class="just_heading just_heading_set">
        </div>
        <div class="Program-main">
            <div class="Program-one-3rd">
				<div class="Program-inner-3rd Program-padding-left">
					<h1>{{$programmes->nom_programme}}</h1>
				</div>
			</div>
			<div class="Program-one-2nd Program-image-left">
				<div class="Program-inner-2nd">
					<div><img src="{{asset('./upload/Programme/'.$programmes->image)}}" width="350" height="350" /></div>
				</div>
				<div class="Program-inner-2nd padding-rnd-program">
					<p>
                        <ul style="text-align: justify;">
                            <li>{{$programmes->description}}</li>
                        </ul>
                         <p style="font-weight: 400; text-align: justify;">
                        <p style="font-weight: 400; text-align: justify;">
                    </p>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection