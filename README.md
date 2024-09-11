# Suomen ympäristö ja sää - WordPress Theme

### Description

This WordPress theme displays current weather information on the front page using the [Visual Crossing](https://www.visualcrossing.com/) API. Additionally, other pages contain news about the lives of animals in Finland.

### Setup

To make the weather feature work, add your `WEATHER_API_KEY` in the `wp-config.php` file:

```php
define('WEATHER_API_KEY', 'your_visual_crossing_api_key');
```

### Screenshots

Located in the screenshots directory.

#### Desktop:

1. page.png
1. front-page.png
1. single.png
1. category.png

#### Mobile (iPhone 12 Pro):

1. page\_(iPhone 12 Pro).png
1. front-page\_(iPhone 12 Pro).png
1. single\_(iPhone 12 Pro).png
1. category\_(iPhone 12 Pro).png

### New Functions Used:

1. `get_template_directory_uri()`: Retrieves the directory URI of the current active theme, allowing for the use of assets.
1. `theme_excerpt_length()`: Customizes the length of post excerpts.
1. `theme_weather()`: A custom function that fetches and displays weather data.
1. `get_template_part()`: Includes reusable template parts in the theme, promoting modularity and reusability of code.

This text describes the theme, provides setup instructions for the weather API, lists the available screenshots, and notes the key functions used in the theme.
