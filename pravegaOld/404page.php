<?php  
	ob_start();
	session_start();
	require_once 'includes/DbConnector.php';
	$db = new DbConnector();
?>
<link href="css/404.css" rel="stylesheet">
<div class="error">

<div class="wrap">
  <div class="404">
    <pre><code>
	 <span class="green">&lt;!</span><span>DOCTYPE html</span><span class="green">&gt;</span>
<span class="orange">&lt;html&gt;</span>
    <span class="orange">&lt;style&gt;</span>
   * {
		        <span class="green">everything</span>:<span class="blue">awesome</span>;
}
     <span class="orange">&lt;/style&gt;</span>
 <span class="orange">&lt;body&gt;</span> 
              ERROR 404!
				FILE NOT FOUND!
				<span class="comment">&lt;!--The file you are looking for, 
					is not where you think it is.--&gt;
		</span>
 <span class="orange"></span> 
			  


</div>
<br />
<span class="info">
<br />

<span class="orange">&nbsp;&lt;/body&gt;</span>

<br/>
      <span class="orange">&lt;/html&gt;</span>
    </code></pre>
  </div>
</div>


</span>

 <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
	<script src="js/ripple.js"></script>