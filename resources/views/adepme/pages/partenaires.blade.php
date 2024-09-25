<?php
	use App\Models\Partenaire;
	$partenaires = Partenaire::where('etat', 1)->get();
?>
<div class="wrapper">
                <div class="heading_and_para">
                    <h2>Nos partenaires</h2>
                        <p>&nbsp;</p>
                </div>
                <div class="brands">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="carousel slide">
                                    <br>
                                    <br>
                                    <br>
                                    <div class="carousel-indicators sliders" data-ride="carousel">
                                        @foreach($partenaires as $partenaire)
                                        <div class="owl-item">
                                            <div class="brands_item d-flex flex-column justify-content-center">
                                                <a href="{{route('page.part.detail',['id' => $partenaire->id])}}"><img width="122" height="89" 
                                                    src="{{asset('./upload/Partenaire/'.$partenaire->image )}}" 
                                                    class="attachment-full size-full wp-post-image" alt="image description" decoding="async"
                                                    loading="lazy" sizes="100vw" />
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach

                                        

                                    </div> <!-- Brands Slider Navigation -->
                                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_all">
                    <a href="{{route('page.partenaire')}}">En savoir plus</a>
                </div>
            </div>