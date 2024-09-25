@extends('adepme.index')
@section('containt')
<div class="contact_us_form">

    <div class="wrapper">
        <div class="right_side_form right_side_form_space">        
            <div class="wpcf7 no-js" id="wpcf7-f238-o1" lang="en-US" dir="ltr">
            <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
            <form action="https://adepme.sn/#wpcf7-f238-o1" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
            
                <div class="form-group">
                    <p><label>Nom  </label><span class="wpcf7-form-control-wrap">
                   <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" 
                    aria-required="true" aria-invalid="false" placeholder="Renseigner votre nom" value="" 
                    type="text" name="your-name" /></span>
                    </p>
                </div>
                
                <div class="form-group">
                    <p><label></label><span class="wpcf7-form-control-wrap">
                   <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" 
                    aria-required="true" aria-invalid="false" placeholder="Renseigner votre nom" value="" 
                    type="text" name="your-name" /></span>
                    </p>
                </div>

                <div class="form-group form-check postion-set-box">
                    <p><span class="wpcf7-form-control-wrap" ><span class="wpcf7-form-control wpcf7-checkbox">
                        <span class="wpcf7-list-item first last"><input type="checkbox" name="checkbox[]" value="Envoyer une copie à votre adresse" />
                        <span class="wpcf7-list-item-label">Envoyer une copie à votre adresse</span></span></span></span><input 
                        class="wpcf7-form-control has-spinner wpcf7-submit send_btn" type="submit" value="Envoyer" />
                    </p>
                </div><div class="wpcf7-response-output" aria-hidden="true"></div>
            </form>
            </div>
        </div>
    </div>
</div> 
@endsection