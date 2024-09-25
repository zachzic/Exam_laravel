<?php
	use App\Models\Service;
	use App\Models\Partenaire;
	use App\Models\Programme;

	$services = Service::where('etat', 1)->get();
	$partenaires= Partenaire::where('etat', 1)->get();
	$programmes= Programme::where('etat', 1)->get();
?>
<div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo_header" href="http://127.0.0.1:8000/adepme"><img src="{{asset('wp-content/uploads/2020/04/logotype-HD-1.png')}}" alt="logo"/></a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-collapse-res " id="navbarSupportedContent">
                <div class="menu-header_menu-container">
					<ul class="navbar-nav main_nav adjust">
						<li id="menu-item-58" class="drop-down-menuone menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
							<a href="#" data-ps2id-api="true">L&rsquo;ADEPME <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul class="sub-menu">
								<li id="menu-item-2045" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2045">
									<a href="{{route('page.mots_dirlo')}}" data-ps2id-api="true">MOT DU DIRECTEUR GÉNÉRAL</a></li>
								<li id="menu-item-2194" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2194">
									<a href="{{route('page.chef_etat')}}" data-ps2id-api="true">Le Chef de l’État sur les PME</a></li>
							</ul>
						</li>
						<li id="menu-item-58" class="drop-down-menuone menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
							<a href="#" data-ps2id-api="true">Services <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul class="sub-menu">
								@foreach($services as $service)
								<li id="menu-item-2045" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2045">
									<a href="{{route('page.service',['id' => $service->id])}}" data-ps2id-api="true">{{$service->nom_service}}</a>
								</li>
								@endforeach
							</ul>
						</li>

						<li id="menu-item-58" class="drop-down-menuone menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
							<a href="#" data-ps2id-api="true">Programmes <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul class="sub-menu">
								@foreach($programmes as $programme)
								<li id="menu-item-2045" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2045">
									<a href="{{route('page.programme',['id' => $programme->id])}}" data-ps2id-api="true">{{$programme->nom_programme}}</a>
								</li>
								@endforeach
							</ul>
						</li>

						<li id="menu-item-58" class="drop-down-menuone menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
							<a href="{{route('page.partenaire')}}" data-ps2id-api="true">Partenaires <i aria-hidden="true">

							</i></a>
						</li>

						<!-- <li id="menu-item-58" class="drop-down-menuone menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-58">
							<a href="{{route('page.contact')}}" data-ps2id-api="true">Contact <i aria-hidden="true">

							</i></a>
						</li> -->
					</ul>
				</div>
                <div class="serach_user_area">
                    
                   <!-- <a class="profile-one-two" href="https://sigpropme.adepme.sn/promoteur/connexion"><img src="/wp-content/uploads/2022/09/Logo-SamaPME.png" alt="user" class="user_set"></a> -->
				   <a id="sama-pme-link" class="profile-one-two" href="#">Sama PME</a>
				   <script>
					document.getElementById("sama-pme-link").addEventListener("click", function(event) {
					event.preventDefault(); // Empêche le comportement par défaut du lien

					// Afficher le message à l'utilisateur
					alert("Sama PME est en construction !");
					});
					</script>
                </div>
            </div>

        </nav>
    </div>