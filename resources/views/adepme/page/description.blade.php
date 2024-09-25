<?php
use App\Models\Service;
$Services=Service::all();
?>
<div class="wrapper">
            <div class="reprehenderit">
                <div class="left_repre">
                    <h2>Un accompagnement tout au long de votre projet</h2>
                    <p>{{$Services->description}}</p>
                </div>
                <div class="right_repre">
                    <!-- Mettre un input pour choisir l'image que l'on veut, puis l'afficher suivant l'id de la page  -->
                    <img src="{{asset('wp-content/uploads/2020/06/IMG_20181127_131631.jpg')}}" alt="graph">
                </div>
            </div>
            <div class="loction_des_area">
                <div class="left_map">
                    <img src="{{asset('wp-content/uploads/2020/06/DSC_3910-e1591145343697.jpg')}}" alt="map">
                </div>
                <div class="map_right_des">
                    <h3> </h3>
                    <p></p>
                </div>
            </div>
        </div>