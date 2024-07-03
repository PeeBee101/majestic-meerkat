<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
<!-- Favicon Images -->
<link rel="apple-touch-icon" sizes="180x180" href="\wp-content\themes\majesticMeerkat\assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="\wp-content\themes\majesticMeerkat\assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="\wp-content\themes\majesticMeerkat\assets/favicon-16x16.png">
<link rel="manifest" href="\wp-content\themes\majesticMeerkat\assets/site.webmanifest">
<link rel="mask-icon" href="\wp-content\themes\majesticMeerkat\assets/safari-pinned-tab.svg" color="#323339">
<link rel="shortcut icon" href="\wp-content\themes\majesticMeerkat\assets/favicon.ico">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-config" content="\wp-content\themes\majesticMeerkat\assets/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<!-- Playwrite Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="full-container">
    <div class="logo-block">
        <div class="logo">
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/majestic-meerkat-logo-sprite.webp" alt="Majestic Meerkat Logo"/></a>
        </div>
    </div>
    <nav class="menu-block" role="navigation">
        <button class="hamburger hamburger--elastic" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <?php wp_nav_menu(array('menu' => 'main_menu', 'menu_class' => 'menu is-hidden', 'menu_id' => 'menu', 'container' => false)); ?>
    </nav>
</header>