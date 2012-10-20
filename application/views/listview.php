<?php if( !empty( $table ) ) : ?>	
<?php $arraykeys = array_keys( $table ); ?>	
	<?php for( $i = 0; $i < sizeof( $table ); $i++ ) : ?>
		<?php $row = $table[ $arraykeys[ $i ] ]; ?>
		
		<h3><?php echo $arraykeys[ $i ]; ?></h3>
		<ul class="<?php echo $arraykeys[ $i ]; ?> collapsed listview" data-id="<?php echo $i; ?>">
			<?php foreach ( $row as $snippet ) : ?>
				<li data-id="<?php echo $snippet->id; ?>" data-attr="<?php echo $snippet->content; ?>">
					<span><?php echo $snippet->title; ?></span>
					<span><?php echo $snippet->tags; ?></span>
				</li>
				<div></div>
			<?php endforeach; ?>
		</ul>
	<?php endfor; ?>
<?php else: ?>
	<h3>Keine Datensätze vorhanden</h3>
<?php endif; ?>