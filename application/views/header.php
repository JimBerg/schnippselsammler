<h2>Snippets</h2>

<nav>
	<ul id="navigation">
		<li <?php if ( $activeTab == 'listview' ) { echo "class='active'"; } ?>>
			<a href="<?php echo site_url( 'snippet/index' ); ?>">Zeigs mir!</a>
		</li>
 		<li <?php if ( $activeTab == 'create' ) { echo "class='active'"; } ?>>
 			<a href="<?php echo site_url( 'snippet/index/create' ); ?>">Noch eins!</a>
 		</li>
	</ul>
</nav>

<div id="search">
	<label>Suche:</label>
	<input type="text" value="Suche Dummy" /> 
</div>
