<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $header_class = 'header';

    if (is_front_page() || is_home() || is_front_page() && is_home()) {
        $header_class .= ' is-home';
    }
    ?>

    <header class="<?= $header_class ?>">
        <header class="header__name">
            <!-- This line creates a link to the homepage of the site.
            // The 'href' attribute contains the URL of the homepage, safely escaped using esc_url().
            // The 'title' attribute is set to the site name, retrieved with get_bloginfo('name') and escaped with esc_attr().
            // Inside the link, the site name is again retrieved and safely displayed with esc_html() inside a <span> tag for SEO.
            // The 'itemprop' attributes are used for structured data to improve SEO.-->
            <a href="<?= esc_url(home_url('/')) ?>" title="<?= esc_attr(get_bloginfo('name')) ?>" rel="home" itemprop="url">
                <!-- New function #4 get_template_part(), echoes template code by given name -->
                <?php get_template_part('logo') ?>
                <span itemprop="name"><?= esc_html(get_bloginfo('name')) ?></span>
            </a>
        </header>

        <nav class=" header__nav">
            <?php wp_nav_menu(['theme_location' => 'primary']); ?>
        </nav>
    </header>