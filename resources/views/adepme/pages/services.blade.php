<?php
	use App\Models\Service;
	$services = Service::where('etat', 1)->get();
?>
<div class="wrapper">
                <ul>
                    <li>
                        <div class="heading_sec">
                            <p>Nos services</p>
                            <h2>Améliorer votre Business</h2>
                        </div>
                    </li>
                    @foreach($services as $service)
                    <li>
                        <a class="outer_area" href="{{route('page.service',['id' => $service->id])}}">
                            <h5><i class="fas fa-network-wired"></i></h5>
                            <h3>{{$service->nom_service}}</h3>
                            <h4 class="read_more"><span>En savoir plus</span><i class="fa fa-arrow-right" aria-hidden="true"></i></h4>
                        </a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>