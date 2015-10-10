<?php
include('testheader.php');
require_once 'logcheck-admin.php';
$log = new LoggedIn();
$log->logincheck();
?> 
    
<!-- About Section -->
    <header class="intro">
        <div class="intro-body">
   <section id="" class=" container-fluid content-section text-center">
        <div class="row">
		<p><br><br></p>
            <div class="col-lg-10 col-lg-offset-1">
                <h2>Change Password</h2>
                <p class="col-lg-10 col-lg-offset-1" style="text-align: justify">
                	<form id="register_form" name="register" method="post" enctype="multipart/form-data" action="pravega_action.php">
                    		<label>* Required fields</label><br>
                            
                            <p class="register"><input class="register_input" type="password" name="current_password" placeholder="Current Password *" title="Current Password" required /></p>
                            <p class="register"><input class="register_input" type="password" name="password" placeholder="New Password *" title="New Password" required /></p>
                            <p class="register"><input class="register_input" type="password" name="cpassword" placeholder="Confirm New Password *" title="Confirm New Password" required /></p>
                            <p class="register"><input class="register_input signup" type="submit" name="edit_password" id="button" class="send_color sign_submit" value="Save" /></p>
                    </form>
                </p>
			</div>
        </div>
    </section>
	</div>
    </header>
	

    <!-- Map Section -->
   <!-- <div id="map"></div>-->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Pravega 2015</p>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

      <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA"></script>




    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
    <script src="js/script.js"></script>

</body>
<a href="https://plus.google.com/+PravegaOrg" rel="publisher">Google+</a>
</html>
