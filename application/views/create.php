<?php echo form_open( 'snippet/create' ); ?>
	
	<label>Titel</label>
	<input type="text" id="title" name="title" />
	
	
	<label>Tags</label>
	<div class="selectBox">
		<input type="text" id="tags" name="tags" />
	</div>
	
	<label>Syntax</label>
	<div class="selectBox">
		<select id="syntax" name="syntax">
			<option name="javascript" value="javascript">javascript</option>
			<option name="php" value="php">php</option>
			<option name="html_css" value="html_css">html & css</option>
			<option name="sql" value="sql">SQL</option>
			<option name="sh" value="sh">bash</option>
			<option name="vb" value="vb">Visual Basic</option>
		</select>	
	</div>
	
	<label>Kommentar</label>
	<textarea id="comment" name="comment"></textarea>

	<input type="hidden" id="newSnippet" name="newSnippet" data-bind="" />
	<input type="submit" value="speichern" id="submitNew" />

<?php echo form_close(); ?>
