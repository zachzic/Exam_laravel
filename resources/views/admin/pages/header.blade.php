<?php
	use Illuminate\Support\Facades\Auth;
	$user = Auth::user();
	
	if ($user) {
		// L'utilisateur existe, vous pouvez accéder à ses propriétés
		$userName = $user->name;
	} else {
		// L'utilisateur n'est pas trouvé, vous pouvez traiter ce cas en conséquence
		$userName = "Utilisateur inconnu";
	}
	
?>
<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="http://127.0.0.1:8000/admin" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="{{asset('merde/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('merde/images/logo-text.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{asset('merde/images/profile/17.jpg')}}" width="20" alt=""/>
									<div class="header-info">
										<span class="text-black"><strong>{{$userName}}</strong></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
									<form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>	
										@csrf
										<a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
											<span class="ml-2">Déconnexion</span>
										</a>
									</form>
								</div>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->