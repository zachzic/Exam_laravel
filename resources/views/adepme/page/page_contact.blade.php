@extends('adepme.index')
@section('containt')
<div class="main_sec_all">
    <div class="wrapper">
        <div class="contact_us_sec">
            <h2>
                Contactez l&rsquo;Agence de Développement<br>et d&rsquo;Encadrement des Petites et<br>Moyennes Entreprises
            </h2>
            <div class="left_contact_form right_side_form">
                        
                <div class="wpcf7 no-js" id="wpcf7-f78-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                        <form id="contact-form" action="https://adepme.sn/contacts#wpcf7-f78-o1" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                            <div style="display: none;">
                                <input type="hidden" name="_wpcf7" value="78" />
                                <input type="hidden" name="_wpcf7_version" value="5.7.7" />
                                <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f78-o1" />
                                <input type="hidden" name="_wpcf7_container_post" value="0" />
                                <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                            </div>
                            <div class="form-group">
                                <p><label>Nom <span>*</span></label><span class="wpcf7-form-control-wrap" data-name="your-name"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Renseigner votre nom" value="" type="text" name="nom" /></span>
                                </p>
                            </div>

                            <div class="form-group">
                                <p><label>E-mail<span>*</span></label><span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Renseigner votre email" value="" type="email" name="email" /></span>
                                </p>
                            </div>

                            <div class="form-group">
                                <p><label>Sujet<span>*</span></label><span class="wpcf7-form-control-wrap" data-name="subject"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Renseigner votre sujet" value="" type="text" name="sujet" /></span>
                                </p>
                            </div>

                            <div class="form-group">
                                <p><label>Message<span>*</span></label><span class="wpcf7-form-control-wrap" data-name="message"><textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Renseigner votre message" name="message"></textarea></span>
                                </p>
                            </div>

                            <div class="form-group form-check form-check-set">
                                <p><input class="wpcf7-form-control has-spinner wpcf7-submit send_btn" type="reset" value="Envoyer" />
                                </p>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                        <script>
                            function clearFormFields(event) {
                                event.preventDefault(); // Empêche l'envoi du formulaire

                                document.getElementById("contact-form").reset();
                            }
                        </script>>
                    </div>
                </div>
                <div class="right_side_address">
                    <span>Adresse</span>
                        <p>8ème étage Immeuble Seydi Djamil </br>Avenue Cheikh Anta Diop x Rue Léo Frobénius </br>Fann Résidence Dakar Sénégal</p>
                    <span>Téléphone</span>
                        <p>(+221) 33 869 70 70</p>
                        <p>(+221) 33 869 70 70</p>
                    <span>Retrouvez-nous sur les réseaux sociaux</span>
                    <ul class="social_nav">
                        <li><a href="https://web.facebook.com/Adepme?fref=ts&amp;_rdc=1&amp;_rdr" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/Adepme" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCjkbZj0nqP6p_iWOdHCcwdQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="mailto:contact@37.187.92.190" target="_blank"><i class="fas fa-envelope"></i></a></li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection