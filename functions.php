<?php
register_nav_menus(['primary' => 'Päävalikko']);

function luonnonystavat_assets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    /* New PHP function #1 get_template_directory_uri() 
Retrieves template directory URI for the active theme.*/
    wp_enqueue_script('luonnonystavat-script', get_template_directory_uri() . '/js/luonnonystavat.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'luonnonystavat_assets');

function luonnonystavat_widgets_init()
{
    register_sidebar(array(
        'name' => 'Sivupalkki',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'luonnonystavat_widgets_init');

function theme_excerpt_read_more()
{
    global $post;
    return ' <a href="' . get_permalink($post->ID) . '">Lue lisää</a>';
}
add_filter('excerpt_more', 'theme_excerpt_read_more');

/* New PHP function #2 theme_excerpt_length() */
function theme_excerpt_length($length)
{
    return 12;
}
add_filter('excerpt_length', 'theme_excerpt_length');

function luonnonystavat_theme_setup()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'luonnonystavat_theme_setup');

function theme_weather()
{
    $weather = '';

    // https://www.visualcrossing.com/resources/documentation/weather-api/timeline-weather-api/
    // For security, key defined in wp-config.php
    $apiKey = WEATHER_API_KEY;
    $location = 'Helsinki';
    $unitGroup = 'metric';
    $aggregateHours = 24;

    $api_url = "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/weatherdata/forecast?unitGroup={$unitGroup}&aggregateHours={$aggregateHours}" .
        "&location={$location}&key={$apiKey}&contentType=json&locationMode=single";

    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);

    if ($response_data) {
        $locationInstance = $response_data->location;
        $values = $locationInstance->values;

        $temperature = $values[0]->temp ?? '';
        $conditions = $values[0]->conditions ?? '';


        if ($temperature !== '' and $conditions !== '') {
            $weather = "{$temperature}°, {$conditions}";
        }
    }

    return $weather;
}
