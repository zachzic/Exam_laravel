<?php
	use App\Models\Service;
	use App\Models\Partenaire;
	use App\Models\Programme;

	$services = Service::where('etat', 1)->get();
	$partenaires= Partenaire::where('etat', 1)->get();
	$programmes= Programme::where('etat', 1)->get();
?>
<div class="wrapper">
        <div class="main_footer">
            <div class="footer_logo_sec">
                <a href="index.html"><img src="{{asset('wp-content/uploads/2020/04/footer_logo.png')}}" alt="footer_logo"></a>
                    <p>L&rsquo;ADEPME est le bras opérationnel<br />
                        de l&rsquo;Etat pour fournir des services<br />
                        non financiers aux PME</p>
                <div class="mb-5 social_icons">
                    <!-- Facebook -->
                    <a class="fb-ic" href="https://web.facebook.com/Adepme?fref=ts&amp;_rdc=1&amp;_rdr" target="_blank">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic" href="https://twitter.com/Adepme" target="_blank">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="li-ic" href="https://www.youtube.com/channel/UCjkbZj0nqP6p_iWOdHCcwdQ" target="_blank">
                        <i class="fab fa-youtube fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <!-- Google +-->
                    <a class="gplus-ic" href="mailto:contact@37.187.92.190" target="_blank">
                        <i class="fas fa-envelope fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </div>
            </div>
            <ul>
                <li>
                    <div class="footer_sec footer_sec_menus">
                        <div class="menu-footer_menu-container"><ul><li id="menu-item-389" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-389"><a href="#" data-ps2id-api="true">L&rsquo;ADEPME</a></li>
                            <li id="menu-item-392" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-392"><a href="{{route('page.partenaire')}}" data-ps2id-api="true">Partenaires</a></li>
                            <!-- <li id="menu-item-393" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-393"><a href="{{route('page.contact')}}" data-ps2id-api="true">Contacts</a></li> -->
                                </ul></div>
                        </div>
                </li>
                <li>
                    <div class="footer_sec footer_sec_3">
                        <h3>Services</h3>
                        <div class="menu-services_menu-container">
                            <ul>
                                @foreach($services as $service)
                                <li id="menu-item-1024" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1024"><a href="{{route('page.service',['id' => $service->id])}}" data-ps2id-api="true">{{$service->nom_service}}</a></li>
                                @endforeach
                            </ul>
                        </div>                    
                    </div>
                </li>
                <li>
                    <div class="footer_sec footer_sec_3">
                        <h3>Programmes</h3>
                        <div class="menu-programmes_menu-container">
                            <ul>
                            @foreach($programmes as $programme)
                                <li id="menu-item-1152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1152"><a href="{{route('page.programme',['id' => $programme->id])}}" data-ps2id-api="true">{{$programme->nom_programme}}</a></li>
                            @endforeach
                            </ul>
                        </div>                    
                    </div>
                </li>
                
                <li>
                    <div class="footer_sec">
                        <h3>adresse</h3>
                        <p><a href="https://www.google.com/maps/place/ADEPME/@14.6988628,-17.4691354,17z/data=!3m1!4b1!4m5!3m4!1s0xec1729a1705bfbb:0x906cad5b7b4a221a!8m2!3d14.6988628!4d-17.4691354" target="_blank" rel="noopener">8ème étage<br />
                        Immeuble Seydi Djamil,<br />
                        Avenue Cheikh Anta Diop x Rue Léo Frobénius,<br />
                        Fann Résidence,<br />
                        Dakar,<br />
                        Sénégal</a></p>
                    <div class="tel_numbers">
                            <p><a href="tel:(+221) 33 869 70 70">(+221) 33 869 70 70</a><br />
                                <a href="tel:(+221) 33 860 13 63">(+221) 33 860 13 63</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="copy_right_sec">
        <div class="wrapper">
            <span class="copy_right">Copyright © 2023 ADEPME(Exam LARAVEL by zachzic). Tous droits réservés.</span>
            </div>
    </div>