<ul class="nav">
	<li class="nav-bar"><a href="#link1">link#1</a></li>
	<li class="nav-bar"><a href="#link2">link#2</a></li>
	<li class="nav-bar"><a href="#link3">link#3</a></li>
</ul>
<div class="nav-panels">
	<div id="link1" class="nav-pane active">
		<form action='op activetions.php' method='post'>
			<?php 

			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>
		</form>

	</div>
	<div id="link2" class="nav-pane"><p>Visível</p></div>
	<div id="link3" class="nav-pane"></div>	
</div>