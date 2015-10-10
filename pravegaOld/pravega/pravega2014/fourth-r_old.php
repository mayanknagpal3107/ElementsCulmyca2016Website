<?php
	include('db_config.php');
	
	session_start();
	
	if (isset($_COOKIE['email']))
	{
		$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		
		$query = "SELECT hash FROM sessions WHERE email=?";
		$stmt = mysqli_prepare($link, $query);
		mysqli_stmt_bind_param($stmt, "s", $_COOKIE['email']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $result);
		mysqli_stmt_fetch($stmt);

		if ($result == $_COOKIE['hash'])
		{
			mysqli_stmt_close($stmt);

			$logged = 1;
			$query = "UPDATE sessions SET expiry=? WHERE email=?";
			
			$expiry = time() + 3600;
			
			$stmt = mysqli_prepare($link, $query);
			mysqli_stmt_bind_param($stmt, "is", $expiry, $_COOKIE['email']);
			mysqli_stmt_execute($stmt);
			
			setcookie("email", $_COOKIE['email'], $expiry);
			setcookie("name", $_COOKIE['name'], $expiry);
			setcookie("hash", $_COOKIE['hash'], $expiry);
		}
		
		else $logged = 0;
	}
		else
			$logged = 0;
?>
<!DOCTYPE HTML>

<html lang="en">

	<head>
		<title>The Fourth R &ndash; Re-envision | Pravega &ndash; the IISc Science, Tech and Cultural Fest</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script type="text/javascript">
			if (top.location != location) { top.location.href = location.href; }
		</script>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,900" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.js"></script>
		<script src="js/jquery.scrollto.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		
		<script src="js/jquery.poshytip.min.js"></script>  
		<script src="js/poshytip_init.js"></script>  
		<link rel="stylesheet" href="js/poshytip/tip-twitter.css" />
		
		<script src="js/modal.js"></script>
		<link rel="stylesheet" href="css/modal.css" />
		
		<script src="js/hyphenate.js"></script>  
		<script src="js/ga.js"></script> 
	</head>
	<body class="no-sidebar">
		
		<div id="mask"></div>
		
		<div id="login-box" class="login-popup">
			<a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
			  <div class="left_half">
				  <form method="post" class="signin" action="login.php">
						<fieldset class="textbox">
						<label class="username">
						<span>Email Address</span>
						<input id="username" name="email" value="" type="text" autofocus autocomplete="on" placeholder="Email Address">
						</label>
						
						<label class="password">
						<span>Password</span>
						<input id="password" name="password" value="" type="password" placeholder="Password">
						</label>
						
						<span style="text-align:center;">
							<input class="button_modal" type="submit" value="Sign in">
						</span>
						<br>
						<span style="text-align:center;">
						<a class="forgot" href="forgot_pass.php">Forgot your password?</a>
						</span>
						</fieldset>
				  </form>
				</div>
				 
				 <div class="right_half">
					<p style="color:#dadada; font-weight:100;">Don't have an account?</span>
					<form class="signin" action="registration_form.php">
						<fieldset class="textbox">
						<input class="button_modal" type="submit" value="Register">
						</fieldset>
					</form>
				</div>
		</div>

		<!-- Header Wrapper -->
		
			<a href="http://www.iisc.ernet.in"><img src="images/iisc_logo.png" style="position:absolute; margin-top:32px; margin-left:25px; left:0; z-index:1;" height="50px"></a>
			<!-- <img src="images/mock_sponsor.png" style="position:absolute; margin-top:15px; margin-right:15px; right:0; z-index:1;" height="60px"> -->

			<div id="header-wrapper" class="wrapper" style="background-size:cover;">
				
				<div class="not-mobile" id="profile-bar">
					<?php
						if ($logged == 1)
						{
							echo "<a href='profile.php'>".$_COOKIE['name']."</a>";
							echo "<span style='margin-left:0.75em; margin-right:0.75em'>|</span><a href='logout.php'>Logout</a>";
						}
						else echo '<a class="login-window" href="#login-box">Login/Register</a>';
					?>
				</div>
				
				<div class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Header -->
								<div id="header">
																
									<div id="tiles">
									<div id="tile-firstrow">
										<a href="tech_events.php"><div id="tile1" class="the_tile" title="Technical Events"></div></a>
										<a href="cultural.php"><div id="tile2" class="the_tile" title="Cultural Events"></div></a>
										<a href="quizzes.php"><div id="tile3" class="the_tile" title="Quizzes"></div></a>
									</div>
									<span>
										<a href="http://pravega.org"><img id="pravega_logo" src="images/pravega_logo_noglow.png" draggable="false" style="-moz-user-select: none; -webkit-user-select: none; user-select: none; "></a>
									</span>
									<div id="tile-firstmobilerow">
										<a href="tech_events.php"><div id="tile1" class="the_tile" title="Technical Events"></div></a>
										<a href="cultural.php"><div id="tile2" class="the_tile" title="Cultural Events"></div></a>
										<a href="quizzes.php"><div id="tile3" class="the_tile" title="Quizzes"></div></a>
									</div>
									<div  style="display: inline-block;">
										<a href="speakers.php"><div id="tile4" class="the_tile" title="Guest Speakers"></div></a>
										<a href="exhibitions.php"><div id="tile5" class="the_tile" title="Exhibitions and Workshops"></div></a>
										<a href="pronights.php"><div id="tile6" class="the_tile" title="Pro-Nights"></div></a>
									</div>
									</div>
									
									<!-- Nav -->
										<nav id="nav">
										<ul>
											<li class="current_page_item"><a href="about_pravega.php">About</a>
												<ul>
													<li><a href="about_pravega.php">About Pravega</a></li>
													<li><a href="about_iisc.php">About IIS<div style="text-transform:lowercase; display:inline;">c</div></a></li>
													<li><a href="committees.php">Organizing Committee</a></li>
													<li><a href="faq.php">FAQ</a></li>
												</ul>	
																			
											</li>
											<!--<li>
												<span>Events</span>
												<ul>
													<li><a href="#">Biology</a></li>
													<li><a href="#">Chemistry</a></li>
													<li><a href="#">Engineering</a></li>
													<li><a href="#">Mathematics</a></li>
													<li><a href="#">Physics</a></li>
													<li><a href="#">Multi-Disciplinary</a></li>
													<li><a href="#">Cultural</a></li>
												</ul>-->
											</li>
											<li><a href="sponsors.php">Sponsors</a></li>
											<li><a href="hospitality.php">Hospitality</a></li>
											<li><a href="contact.php">Contact</a></li>
										</ul>
										</nav>
									<!-- /Nav -->

								</div>
							<!-- /Header -->

						</div>
					</div>
				</div>
				<div id="social-media" class="only-desktop">
					<a target="_blank" href="https://www.facebook.com/PravegaIISc"><div class="sm-icon" id="fb"></div></a>
					<a target="_blank" href="https://plus.google.com/114655802356939440546"><div class="sm-icon" id="gplus"></div></a>
					<a target="_blank" href="http://twitter.com/PravegaIISc"><div class="sm-icon" id="twitter"></div></a>
				</div>
			</div>
		<!-- /Header Wrapper -->
		<!-- Main Wrapper -->
			<div class="wrapper wrapper-style2">
				<!--<div class="title">No Sidebar</div>-->
				<div class="container">
					<div class="row">
						<div class="12u">
							
							<!-- Main -->
								<div id="main">
									<div>
										<div class="row">
											<div class="12u skel-cell-mainContent">
											
												<!-- Content -->
													<div id="content">
														<article class="is is-post">
															<header class="style1">
																<h2>The Fourth R &ndash; Re-Envision</h2>
																
															</header>
															<?php
																if (isset($_SESSION['success']))
																{
															?>
																	<hr style="margin:1.5em 0em 1.5em 0em;">
																		<div style="text-align:center;"><h2>You have registered your team successfully.</h2></div>
																	<hr style="margin:1.5em 0em 1.5em 0em;"><br>
															<?php
																}
															?>
															<div class="row">
																<div class="12u" align="center">
																	<h3>Apply the Fourth R &ndash; Re-Envision!</h3>
																</div>
															</div>
															
															<div class=row>
																<div class="3u"></div>
																<div class="6u hyphenate">
																	<p>Are you a pro at film making? Do you have a green thumb? If your answer is yes, The Fourth R &ndash; RE-ENVISION is the perfect event for you. Showcase your proficiency in cinematography and let your imagination go green!</p>
																<p style="text-align:center;">
																	<a href="" class="button button-style1" onclick="$.scrollTo('#register', 400, {offset:-25}, {easing:'swing'}); return false;">Register now!</a>
																</p>
																</div>
																<div class="3u"></div>
																
																<div class="12u" align="center" style="margin-top:10px;">
																	<hr style="margin-top:-30px;">
																	<h2>Rules:</h2>
																	<div id="rules">
																	<ol>
																		<li>The videos used in your short film must be shot by you and you only. Plagiarism will not be tolerated.</li>
																		<li>The duration of the videos can be anywhere between 20 seconds to 10 minutes.</li>
																		<li>Videos can be edited or modified according to your convenience.</li>
																		<li>All the videos should be submitted online on or before <b>20th December, 2013</b>.</li>
																		<li>When shooting your short film you will have to show your face in the last and first 5 seconds of the film. This is only to verify your identity. Don't worry; we'll splice it out before showing it on the big screen!</li>
																		<li>The selected short film will be showcased during Pravega if and only if you are present at Pravega to complete the verification of your identity.</li>
																		<li>You'll also have to provide us with the original unedited video files (in RAW or EXIF format) from your camera with unaltered attributes, for verification of originality.</li>
																		<li>The selection of videos by panel of judges shall be final and binding, and not subject to any further queries, objections or negotiations.</li>
																	</ol>
																	</div>
																	<hr>
																	<div>
																		<h2 id="register">Register</h2>
																		<?php
																			if ($logged == 1)
																			{
																		?>
																		<form method="post" action="register_event.php" class="signin">
																			<input type="hidden" name="event_name" value='The Fourth R - Re-envision'>
																			<table style="border-collapse:collapse;">																			
																			<tr>
																				<td class="form_labels">Email Address:<div style="font-size:13px; margin-top:-7px;">(As registered here)</div></td>
																				<td><?php echo $_COOKIE['email']; if (isset($_SESSION['errors_activation1'])) echo '<br><span style="color: red; font-size:13px; margin-top:-7px;">(not activated)</span>'; else if (isset($_SESSION['errors_in_team1'])) echo '<br><span style="color: red;  font-size:13px; margin-top:-7px;">(already registered)</span>' ?><input name="email1" type="hidden" value="<?php echo $_COOKIE['email']; ?>"></td>
																			</tr>
																			
																			<tr>
																				<td style="text-align:center; padding-top:35px;" colspan="2">
																					<fieldset class="textbox">
																					<input class="button_modal textbox" style="display:inline-block; border:0px;" type="submit" value="Register">
																					</fieldset>
																				</td>
																			</tr>
																			</table>
																		</form>
																		<?php
																			}
																			else
																			{
																		?>
																			You need to be <a class="login-window" href="#login-box" onclick="document.getElementById('username').focus(); $.scrollTo(0, 400, {offset:50}, {easing:'swing'});">logged in</a> to register.
																		<?php
																			}
																		?>
																	</div>
																</div>
															</div>
														</article>
														
													</div>
												<!-- /Content -->
											
											</div>
										</div>
									</div>
								</div>
							<!-- /Main -->
							
						</div>
					</div>
				</div>
			</div>
		<!-- /Main Wrapper -->
		
	</body>
	<?php
		session_destroy();
	?>
</html>