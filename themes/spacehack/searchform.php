<?php if (!is_search()) {
		// Default search text
		$search_text = "Kitten";
	} else { $search_text = "$s"; }
?>
<div id="search">
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<div>
			<input type="text" name="s" id="s" value="<?php echo wp_specialchars($search_text, 1); ?>" onfocus="clearInput('s', '<?php echo wp_specialchars($search_text, 1); ?>')" onblur="clearInput('s', '<?php echo wp_specialchars($search_text, 1); ?>')" /> 
		</div>
	</form>
</div>
