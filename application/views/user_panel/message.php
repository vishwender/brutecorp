<style>
.message {
    background-color: #f7f7f7;
    border: 1px solid #ccc;
    clear: both;
    color: #8e8e8e;
    margin: auto;
    padding: 20px 200px;
    text-align: center;
    font-size: large;
}
</style>
<div class="container">

<?php 
$message=$this->session->flashdata('message');
if (!empty($message)){ ?>
<!-- Google Code for Thank you Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 961200688;
var google_conversion_language = "en";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "emVbCJSRplcQsISrygM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/961200688/?label=emVbCJSRplcQsISrygM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<section class="section">
	<div class="container">
		<div class="row">
			<?php
			echo '<div class="message">'. $message. '</div>';	
			}
			x?>
		</div>
	</div>
</section>


</div>