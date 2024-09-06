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
            <?= '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html(get_bloginfo('name')) . '</span></a>' ?>
        </header>

        <nav class="header__nav">
            <?php wp_nav_menu(['theme_location' => 'primary']); ?>
        </nav>
    </header>