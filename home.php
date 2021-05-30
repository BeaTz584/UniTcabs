<?php 
session_start();
include 'login.php';
include 'head.php';?>
<!DOCTYPE html>
<html>
<?php include 'navbar.php';?>
	<body class="loggedin">
                        <div class="py-5 row d-flex align-items-center" >
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line" style="text-align:center;">
								TEAM CONTRIBUTION 
								<br>& 
                                  <br>BUDGET SYSTEM
                              </h1>
                                <p class="banner-body text-muted py-3 mx-0 px-0">
                                    
                              </p>
                            </div>
                        </div>



    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <h2 class="h2 text-center col-12 py-5 semi-bold-600">Quote of the Day</h2>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                    <i class='bx bx-gift h3 mt-1'></i>
                </div>
            </div>
            <p class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
			Sometimes when I close my eyes, I can't see.
            </p>
        </div>
    </section>
<?php include 'Footer.php';?>
	</body>
</html>