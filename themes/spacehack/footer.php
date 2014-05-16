<div class="footer">
    <ul class="nav">
        <?php if (!is_search()) {
        		$search_text = "";
        	}
        	else {
        	    $search_text = "$s";
        	}
        ?>
        <li class="search">
        	<form method="get" action="<?php bloginfo('url'); ?>/">
        		<input onfocus="if (this.placeholder == 'Search') {this.placeholder  = '';}" onblur="if (this.placeholder  == '') {this.placeholder  = 'Search';}" class="search" type="search" name="s" value="<?php echo wp_specialchars($search_text, 1); ?>" placeholder="Search">
        		<input class="button" type="submit" value="Search">
            	</form>
        </li>
        <li><a href="/about">About Seahack</a></li>
        <li><a href="/guidelines">Community Guidelines</a></li>
        <li><a href="mailto:ariel@seahack.org">Contact</a></li>
        <li><a href="/disclaimer">Disclaimer</a></li>
    </ul>
	<p class="credit">
    	
	</p>
	<?php # echo "<p class='debugging'>" . get_num_queries() . " queries. " . timer_stop(1) . " seconds.</p>"  ?>
	<?php wp_footer(); ?>
</div>
<!-- /.footer -->
</body>
</html>
