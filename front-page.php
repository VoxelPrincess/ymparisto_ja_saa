<!-- New PHP function #1 get_template_directory_uri() 
Retrieves template directory URI for the active theme. -->
<?php
$assets = get_template_directory_uri() . '/assets';
$pics = ['autumn.jpg', 'winter.jpg', 'summer.jpg', 'spring.jpg'];
/* array_rand($pics) - selects a random key from the $pics array to choose a random image. */
$random = array_rand($pics);

$textStyle = 'background-image: url(' . $assets . '/' . $pics[$random] . ');';
?>
<?php get_header() ?>

<div id="content">
  <main class="weather">
    <header class="weather__slogan">
      <!-- $textStyle (background image setup) - Generates an inline CSS style to set a random background image for each block. -->
      <a href="<?= get_permalink(2) ?>" title="Ympäristö">
        <span style="<?= $textStyle ?>">Suomen</span>
        <span style="<?= $textStyle ?>">Ympäristö ja sää</span>
      </a>
    </header>

    <footer class="weather__temp" style="<?= $textStyle ?>">
      <!-- New PHP function #3 theme_weather() 
          Retrieves weather. -->
      <?= theme_weather() ?>
    </footer>
  </main>
</div>

<?php get_footer() ?>