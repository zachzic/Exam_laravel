@extends('adepme.index')
@section('containt')
<div class="banner_sec" style="background: url('{{ asset('wp-content/uploads/2020/06/DSC_3829-e1591144561745.jpg') }}') no-repeat center left #8EC657">
       <div class="wrapper">
            <div class="right_side_des">
            		<h2>{{$Services->nom_service}}</h2>
                    
                    <p>
                    </p>

                <p></p>
            </div>
        </div>
</div>

<div class="wrapper">
            <div class="reprehenderit">
                <div class="left_repre">
                    <h2>       </h2>
                    <p>{{$Services->description}}</p>
                </div>
                <div class="right_repre">
                    <!-- Mettre un input pour choisir l'image que l'on veut, puis l'afficher suivant l'id de la page  -->
                    <img src="{{asset('./upload/Service/'.$Services->image)}}" width="350" height="350" alt="graph">
                </div>
            </div>
            <div class="loction_des_area">
                <div class="left_map">
                    <img src="{{asset('wp-content/uploads/2020/06/IMG_20181127_131631.jpg')}}" alt="map">
                </div>
                <div class="map_right_des">
                    <h3> </h3>
                    <p></p>
                </div>
            </div>
        </div>

        <!-- <div class="contact_us_form">

    <div class="wrapper">
        <div class="form_main">
            <div class="left_sec_contact_text">
                <h2>Contactez-Nous</h2>
            </div>
            <div class="right_side_form_sec">
                
                <div class="wpcf7 no-js" id="wpcf7-f151-o1" lang="en-US" dir="ltr">
                <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                <form action="#" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                <div style="display: none;">
                <input type="hidden" name="_wpcf7" value="151" />
                <input type="hidden" name="_wpcf7_version" value="5.7.7" />
                <input type="hidden" name="_wpcf7_locale" value="en_US" />
                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f151-o1" />
                <input type="hidden" name="_wpcf7_container_post" value="0" />
                <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                </div>
                <div class="form-group">
                    <p><label>Nom <span>*</span></label><span class="wpcf7-form-control-wrap" data-name="your-name"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Renseigner votre nom" value="" type="text" name="your-name" /></span>
                    </p>
                </div>
                <div class="form-group">
                    <p><label>E-mail <span>*</span></label><span class="wpcf7-form-control-wrap" data-name="email"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Renseigner votre email" value="" type="email" name="email" /></span>
                    </p>
                </div>
                <div class="form-group form-check form-check-sec">
                    <p><input class="wpcf7-form-control wpcf7-submit send_btn_submit" type="reset" value="Envoyer" />
                    </p>
                </div><div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>  -->
@endsection