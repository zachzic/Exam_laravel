<!DOCTYPE html>
<html lang="fr">
<head>
		@include("admin/pages/head")
</head>
<body>


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

	   
		@include("admin/pages/header")
	   

		@include("admin/pages/nav")
		
		<!--**********************************
            Content body start
        ***********************************-->

		@yield("containt")
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
		@include("admin/pages/footer")
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
		@include("admin/pages/js")
</body>
</html>