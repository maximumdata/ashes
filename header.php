<!doctype html>
<html>
<head>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Josefin+Sans|Arvo' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php if( is_single() ) {
  echo '<link rel="stylesheet" href="//cdn.jsdelivr.net/highlight.js/8.6/styles/default.min.css">';
} ?>
</head>
<body>
  
  <nav>
    <div class="big-menu">
      <?php wp_nav_menu( array( 'menu' => 'header-menu', 'container' => false ) ); ?>
      <div class="brand">
        <h2 id="name">Mike Dettmer</h2>
        <h4 id="tag">Builds the internet</h4>
      </div>
    </div>
    <div id="mobile-menu">
      <div id="burger">
        <i class="fa fa-bars fa-2x"></i>
      </div>
      <div id="brand">
        <h2 id="name">Mike Dettmer</h2>
        <h4 id="tag">Builds the internet</h4>
      </div>
      <div id="off-canvas">
        <?php wp_nav_menu( array( 'theme_location' => 'off-canvas-menu', 'menu' => 'off-canvas-menu', 'container' => false ) ); ?>
      </div>
    </div>
  
  </nav>