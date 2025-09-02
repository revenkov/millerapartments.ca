<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-57x57.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-114x114.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-72x72.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-144x144.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-60x60.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-120x120.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-76x76.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-152x152.png'); ?>" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-196x196.png'); ?>" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url( 'favicon/favicon-96x96.png'); ?>" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-32x32.png'); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url( 'favicon/favicon-16x16.png'); ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-128.png'); ?>" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo selectrum_get_image_url('favicon/mstile-144x144.png'); ?>" />
    <meta name="msapplication-square70x70logo" content="<?php echo selectrum_get_image_url('favicon/mstile-70x70.png'); ?>" />
    <meta name="msapplication-square150x150logo" content="<?php echo selectrum_get_image_url('favicon/mstile-150x150.png'); ?>" />
    <meta name="msapplication-wide310x150logo" content="<?php echo selectrum_get_image_url('favicon/mstile-310x150.png'); ?>" />
    <meta name="msapplication-square310x310logo" content="<?php echo selectrum_get_image_url('favicon/mstile-310x310.png'); ?>" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="site" class="bodyInner">

    <header id="header" class="siteHeader" role="banner">
        <div class="siteHeader__inner">
            <div class="siteHeader__buttons">
                <a href="<?php echo selectrum_get_permalink( 2557 ); ?>">
                    Book a tour
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20">
                        <path fill="currentColor" stroke-width="0px" d="M7.95,16.35l-3.55-3.55,1.45-1.45,2.1,2.1,4.2-4.2,1.45,1.45-5.65,5.65ZM2,20c-.55,0-1.02-.2-1.41-.59-.39-.39-.59-.86-.59-1.41V4c0-.55.2-1.02.59-1.41.39-.39.86-.59,1.41-.59h1V0h2v2h8V0h2v2h1c.55,0,1.02.2,1.41.59s.59.86.59,1.41v14c0,.55-.2,1.02-.59,1.41s-.86.59-1.41.59H2ZM2,18h14v-10H2v10ZM2,6h14v-2H2v2ZM2,6v-2,2Z"/>
                    </svg>
                </a>

                <?php
                $phone = get_field('phone', 'options');
                if ( !empty( $phone ) ) :
                    ?>
                    <a href="tel:+1<?php echo $phone; ?>">
                        <?php echo $phone; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path fill="currentColor" stroke-width="0px" d="M16.95,18c-2.08,0-4.14-.45-6.18-1.36-2.03-.91-3.88-2.2-5.55-3.86s-2.95-3.52-3.86-5.55C.45,5.19,0,3.13,0,1.05c0-.3.1-.55.3-.75s.45-.3.75-.3h4.05c.23,0,.44.08.63.24s.29.35.33.56l.65,3.5c.03.27.03.49-.03.68s-.14.34-.28.48l-2.43,2.45c.33.62.73,1.21,1.19,1.79s.96,1.13,1.51,1.66c.52.52,1.06,1,1.63,1.44s1.17.85,1.8,1.21l2.35-2.35c.15-.15.35-.26.59-.34s.48-.1.71-.06l3.45.7c.23.07.43.19.58.36s.23.37.23.59v4.05c0,.3-.1.55-.3.75s-.45.3-.75.3ZM3.03,6l1.65-1.65-.43-2.35h-2.23c.08.68.2,1.36.35,2.03s.37,1.33.65,1.98ZM11.98,14.95c.65.28,1.31.51,1.99.68s1.35.28,2.04.33v-2.2l-2.35-.48-1.68,1.68Z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <button class="btnMenu" id="btnMenu" data-text-default="<?php echo __( 'Menu', 'selectrum' ); ?>" data-text-close="<?php echo __( 'Close', 'selectrum' ); ?>">
                <span class="btnMenu__text"><?php echo __( 'Menu', 'selectrum' ); ?></span>
                <span class="btnMenu__hamburger"><span></span><span></span><span></span></span>
            </button>
        </div>
    </header>


    <a class="siteLogo" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'blog_name' ); ?>">
        <img class="siteLogo__image" src="<?php echo selectrum_get_image_url('logo.svg'); ?>" alt="<?php bloginfo( 'blog_name' ); ?>">
    </a>


    <nav id="mainNav" class="mainNav" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'selectrum' ); ?>">

        <div class="mainNav__buttons">
            <?php
            $phone = get_field('phone', 'options');
            if ( !empty( $phone ) ) :
                ?>
                <a href="tel:+1<?php echo $phone; ?>">
                    <?php echo $phone; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path fill="#97b4ed" stroke-width="0px" d="M16.95,18c-2.08,0-4.14-.45-6.18-1.36-2.03-.91-3.88-2.2-5.55-3.86s-2.95-3.52-3.86-5.55C.45,5.19,0,3.13,0,1.05c0-.3.1-.55.3-.75s.45-.3.75-.3h4.05c.23,0,.44.08.63.24s.29.35.33.56l.65,3.5c.03.27.03.49-.03.68s-.14.34-.28.48l-2.43,2.45c.33.62.73,1.21,1.19,1.79s.96,1.13,1.51,1.66c.52.52,1.06,1,1.63,1.44s1.17.85,1.8,1.21l2.35-2.35c.15-.15.35-.26.59-.34s.48-.1.71-.06l3.45.7c.23.07.43.19.58.36s.23.37.23.59v4.05c0,.3-.1.55-.3.75s-.45.3-.75.3ZM3.03,6l1.65-1.65-.43-2.35h-2.23c.08.68.2,1.36.35,2.03s.37,1.33.65,1.98ZM11.98,14.95c.65.28,1.31.51,1.99.68s1.35.28,2.04.33v-2.2l-2.35-.48-1.68,1.68Z"/>
                    </svg>
                </a>
            <?php endif; ?>

            <a href="<?php echo selectrum_get_permalink( 2557 ); ?>">
                Book a tour
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20">
                    <path fill="#97b4ed" stroke-width="0px" d="M7.95,16.35l-3.55-3.55,1.45-1.45,2.1,2.1,4.2-4.2,1.45,1.45-5.65,5.65ZM2,20c-.55,0-1.02-.2-1.41-.59-.39-.39-.59-.86-.59-1.41V4c0-.55.2-1.02.59-1.41.39-.39.86-.59,1.41-.59h1V0h2v2h8V0h2v2h1c.55,0,1.02.2,1.41.59s.59.86.59,1.41v14c0,.55-.2,1.02-.59,1.41s-.86.59-1.41.59H2ZM2,18h14v-10H2v10ZM2,6h14v-2H2v2ZM2,6v-2,2Z"/>
                </svg>
            </a>
        </div>

        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary_menu',
            'menu_class'     => 'primaryMenu',
            'menu_id'        => 'primaryMenu',
            'container'      => false
        ) );
        ?>
    </nav>


    <div id="siteContent" class="siteContent" role="main">