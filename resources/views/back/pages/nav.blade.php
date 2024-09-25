<?php

namespace App\Http\Controllers;
use App\Models\acces;
use App\Models\attribution;
use App\Models\module;
use App\Models\groupe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


  $attrib=attribution::all()->where('User_id','=',Auth::user()->id)->first();
  $grp=$attrib->Groupe_id;
  $access=acces::all()->where('groupe_id','=',$grp);
  $modules=module::all();
?>
<div class="sidebar"> 
     <!-- Sidebar user panel -->
<div class="user-panel">
        
    <div class="info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-cog"></i></a> 
          <a href="#"><i class="fa fa-envelope-o"></i></a> 
          <a href="#"><i class="fa fa-power-off"></i></a> 
    </div>
  </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-toggle-down"></i>MENU</li>
        <li class="active"><a href="http://127.0.0.1:8000/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="/app/module"><i class="fa fa-gear"></i><span>Module</span>  <span class="pull-right-container"></span> </a></li>
        @foreach($access as $acces)
          <li class="active"><a href="{{$acces->module? $acces->module->url:''}}"><i class="fa fa-toggle-down"></i><span>{{$acces->module? $acces->module->nom_module:''}}</span>  <span class="pull-right-container"></span> </a></li>
        @endforeach
        <li class="active"><a href="/app/groupe"><i class="fa fa-users"></i><span>Groupe</span>  <span class="pull-right-container"></span> </a></li>
        <li class="active"><a href="/app/acces"><i class="fa fa-eye"></i><span>Acces</span>  <span class="pull-right-container"></span> </a></li>
        <li class="active"><a href="/app/attribution"><i class="fa fa-folder"></i><span>Attribution</span>  <span class="pull-right-container"></span> </a></li>
          <!--   <li class="treeview"> <a href"#"> parametre <i class="fa fa-bullseye"></i> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="./?app=Modules">Gestion Modules</a></li>
            <li><a href="./?app=Utilisateurs">Gestion Utilisateurs</a></li>
            <li><a href="./?app=Groupes">Gestion Groupes</a></li>
            <li><a href="./?app=Acces">Gestion Acces</a></li>
            <li><a href="./?app=Étudiants">Gestion Étudiants</a></li>
            <li><a href="./?app=Paiements">Gestion Paiements</a></li>
            <li><a href="./?app=Etats">Gestion des États</a></li>
          </ul>
        </li>
        
          <li class="treeview"> <a href="#"> <i class="fa fa-envelope-o "></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="apps-mailbox.html">Mailbox</a></li>
            <li><a href="apps-mailbox-detail.html">Mailbox Detail</a></li>
            <li><a href="apps-compose-mail.html">Compose Mail</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-briefcase"></i> <span>UI Elements</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="ui-cards.html" class="active">Cards</a></li>
            <li><a href="ui-user-card.html">User Cards</a></li>
            <li><a href="ui-tab.html">Tab</a></li>
            <li><a href="ui-grid.html">Grid</a></li>
            <li><a href="ui-buttons.html">Buttons</a></li>
            <li><a href="ui-notification.html">Notification</a></li>
            <li><a href="ui-progressbar.html">Progressbar</a></li>
            <li><a href="ui-range-slider.html">Range slider</a></li>
            <li><a href="ui-timeline.html">Timeline</a></li>
            <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
            <li><a href="ui-typography.html">Typography</a></li>
            <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
            <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
            <li><a href="ui-list-media.html">List Media</a></li>
            <li><a href="ui-carousel.html">Carousel</a></li>
          </ul>
        </li>
        <li class="header">FORMS, TABLE & WIDGETS</li>
        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Forms</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="form-elements.html">Form Elements</a></li>
            <li><a href="form-validation.html">Form Validation</a></li>
            <li><a href="form-wizard.html">Form Wizard</a></li>
            <li><a href="form-layouts.html">Form Layouts</a></li>
            <li><a href="form-uploads.html">Form File Upload</a></li>
            
            <li><a href="form-summernote.html">Summernote</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-table"></i> <span>Tables</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="table-basic.html">Basic Tables</a></li>
            <li><a href="table-layout.html">Table Layouts</a></li>
            <li><a href="table-data-table.html">Data Tables</a></li>
            <li><a href="table-jsgrid.html">Js Grid Table</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-th"></i> <span>Widgets</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="widget-data.html">Data Widgets</a></li>
            <li><a href="widget-apps.html">Apps Widgets</a></li>
          </ul>
        </li>
        <li class="header">EXTRA COMPONENTS</li>
        <li class="treeview"> <a href="#"><i class="fa fa-bar-chart"></i> <span>Charts</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="chart-morris.html">Morris Chart</a></li>
            <li><a href="chart-chartist.html">Chartis Chart</a></li>
            
            <li><a href="chart-knob.html">Knob Chart</a></li>
            <li><a href="chart-chart-js.html">Chartjs</a></li>
            <li><a href="chart-peity.html">Peity Chart</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-files-o"></i> <span>Sample Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="pages-blank.html">Blank page</a></li>
            <li class="treeview"><a href="#">Authentication <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
              <ul class="treeview-menu">
                <li><a href="pages-login.html">Login 1</a></li>
                <li><a href="pages-login-2.html">Login 2</a></li>
                <li><a href="pages-register.html">Register</a></li>
                <li><a href="pages-register2.html">Register 2</a></li>
                <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                <li><a href="pages-recover-password.html">Recover password</a></li>
              </ul>
            </li>
            <li><a href="pages-profile.html">Profile page</a></li>
            <li><a href="pages-invoice.html">Invoice</a></li>
            <li><a href="pages-treeview.html">Treeview</a></li>
            <li><a href="pages-pricing.html">Pricing</a></li>
            <li><a href="pages-gallery.html">Gallery</a></li>
            <li><a href="pages-faq.html">Faqs</a></li>
            <li><a href="pages-404.html">404 Error Page</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-map-marker"></i> <span>Maps</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="map-google.html">Google Maps</a></li>
            <li><a href="map-vector.html" class="active">Vector Maps</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-paint-brush"></i> <span>Icons</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
            <li><a href="icon-themify.html">Themify Icons</a></li>
            <li><a href="icon-linea.html">Linea Icons</a></li>
            <li><a href="icon-weather.html">Weather Icons</a></li>
            <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
            <li><a href="icon-flag.html">Flag Icons</a></li>
          </ul>
        </li>
        <li class="treeview"> <a href="#"> <i class="fa fa-share"></i> <span>Multilevel</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview"> <a href="#">Level One <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
              <ul class="treeview-menu">
                <li><a href="#"> Level Two</a></li>
                <li class="treeview"> <a href="#">Level Two <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>
      -->
      </ul>
    </div>