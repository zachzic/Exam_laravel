@extends('adepme.index')
@section('containt')

    <div class="main_sec_all">
    @include("adepme/pages/carousel")
    
    @include("adepme/pages/status")

            <div class="votrebusiness_sec">
                @include("adepme/pages/services")
            </div>
            <div class="partenaires_sec">
            @include("adepme/pages/partenaires")
            </div>
            <div class="nouvelles_sec">
            <!-- @include("adepme/pages/actualites") -->
            </div>
            <div class="comments_sec">
            @include("adepme/pages/youtube")
            </div>
            <!-- <div class="contact_us">
            
            @include("adepme/pages/contact")
            </div> -->
    </div>
@endsection