<?php echo $this->element('innerhead');?>

<body>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700,900|Open+Sans:300,400,700|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,300' rel='stylesheet' type='text/css'>
<script type="text/javascript">
		$(document).ready(function(){
 $(".demo1 .rotate").textrotator({
        animation: "fade",
        speed: 2000
      });
});
	</script>
	<div id="wrapper">
		<nav class="stickynav" id="stickynav">
			<!-- <a href="#" class="uparrow">Uparrow</a> -->
			<ul>
				<li class="uparrow"><a href="#">up</a></li>
				<li><a href="#selection1">Selection 01</a></li>
				<li class="user-profile"><a href="#carousel">Selection 02</a></li>
				<li class="users"><a href="#post-task">Selection 03</a></li>
				<li class="setting"><a href="#local-services">Selection 04</a></li>
				<li class="enlarge"><a href="#popular">Selection 05</a></li>
				<li class="newspaper"><a href="#complete-tasks">Selection 06</a></li>
				<li class="list"><a href="#video">Selection 07</a></li>
				<li class="menu"><a href="#clients">Selection 08</a></li>
				<li class="downarrow"><a href="#">down</a></li>
			</ul>
			<!-- <a href="#" class="downarrow">Downarrow</a> -->
		</nav>
		
		<?php echo $this->element('header');?>
		<?php echo $content_for_layout; ?>
		<?php echo $this->element('footer');?>
	</div>
</body>
</html>
