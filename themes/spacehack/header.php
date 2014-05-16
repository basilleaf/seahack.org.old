<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php
    wp_title(" · ", true, 'right');
    bloginfo('name');
?></title>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45860913-1', 'seahack.org');
  ga('send', 'pageview');

</script>


<!-- Data Profiles -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="profile" href="http://microformats.org/profiles/hcard">
<link rel="profile" href="http://microformats.org/profiles/hatom">

<!-- Stylesheets  -->
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen, projection">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/spacehack_excerpts.css" media="screen, projection">


<!--[if IE]>
<style type="text/css">
.cats_tags ul {
        clear:both;
        margin:0; padding:0;
        margin-top:5px;
        display:block;
    }
</style>
<![endif]-->

<!--[if IE 9]>
<style type="text/css">
.header .nav {
        margin-bottom:20px;
}
.cats_tags {
   margin:0; padding:0;
   position: relative;
   top: 192px;
   right: 8px;
   text-align:right;
}

h2.cats {
        margin:0; padding:0;
}
.cats_tags ul {
        position:relative;
        top:-50px;
        right:0px;
        clear:both;
        margin:0; padding:0;
        display:block;
    }

</style>
<![endif]-->



<!-- Syndication -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php bloginfo('rss2_url'); ?>">

<!-- Decentralization -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- More -->
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

</head>

<body class="org-spacehack<?php
    if(0 < stripos($_SERVER["SERVER_NAME"], ".dev")) {
        echo " devel";
    } ?><?php
    echo " " . get_body_classes(); ?>">

    <ul class="subscribe">
        <li><img src = "<?php bloginfo('template_url'); ?>/images/spacehack_twitter.jpg" alt = ""><a class="twitter" href="http://twitter.com/seahackorg" title="Follow Seahack on Twitter">follow @seahackorg</a></li>
        <li><img src = "<?php bloginfo('template_url'); ?>/images/pinterest_badge_red_40px.png" alt = ""><a class="pinterest" href="http://www.pinterest.com/arielwaldman/creepy-awesome-sea-slime/" title="Get Inspiration">get inspiration</a></li>
        <li><img src = "<?php bloginfo('template_url'); ?>/images/spacehack_envelope.jpg" alt = ""><a class="submit-hack" href="http://seahack.org/submit">submit a project</a></li>
    </ul>
    <!-- /.subscribe -->

    <div class="header">
        <h1>
            <a href="<?php echo get_settings('home'); ?>/" title="Home"><?php
                bloginfo('name');
            ?></a>
        </h1>
        <p class="description"><?php
            bloginfo('description');
        ?></p>

        <!-- p class="submit">
            Created or know of a participatory space project?
            <a class="submit-hack" href="http://spacehack.org/submit">Submit a new Project</a>
        </p -->

    	<div class="nav">
            <div>&nbsp;</div>
    	    <ul>
    		<li class = "sh_competition <?php the_nav_style("competition"); ?>"><a href="/category/competition">Competition</a></li>
		<li class = "sh_data-analysis <?php the_nav_style("data-analysis"); ?>"><a href="/category/data-analysis" >Data Analysis</a></li>
    		<li class = "sh_observing <?php the_nav_style("observing"); ?>"><a href="/category/observing">Observing</a></li>
    		<li class = "sh_open-source <?php the_nav_style("open-source"); ?>"><a href="/category/open-source">Open Source</a></li>
    	    </ul>
        </div>
        <!-- /.nav -->
    </div>
    <div class="mobile_header"></div>


    <!-- /.header -->