<!DOCTYPE html>
<html lang="fr">
<head>
   @include("back/pages/head") 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
   @include("back/pages/header")
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    @include("back/pages/nav")
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
 @yield("containt")
<!-- /.content-wrapper -->
    @include("back/pages/footer")
<!-- ./wrapper --> 
@include("back/pages/js")
</body>
</html>
