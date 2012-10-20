<?php echo form_open( 'snippet/saveData' ); ?>
 	<input type="hidden" name="snippetId" id="snippetId" value=""/> 			
	<input type="hidden" name="snippet" id="snippet" data-bind="value: snippet" /> <!-- so lets knock this out -->
	<div id="previewbox">
		<pre class="prettyprint lang-js" contenteditable="false" id="codebox" data-bind="htmlValue: snippet">Snippet is here!</pre>
	</div>
	<input type="submit" value="Speichern" id="submit"/>
<?php echo form_close(); ?>
