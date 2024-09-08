<?php
$assets = get_template_directory_uri() . '/assets';
$pics = ['autumn.jpg', 'winter.jpg', 'summer.jpg', 'spring.jpg'];
$random = array_rand($pics);
$textStyle = 'background-image: url(' . $assets . '/' . $pics[$random] . ');';
?>
<?php get_header() ?>

<div id="content">
  <main class="weather">
    <header class="weather__slogan">
      <div style="<?= $textStyle ?>">Suomen</div>
      <div style="<?= $textStyle ?>">Ympäristö ja sää</div>
    </header>
    <!-- TODO: show actual weather -->
    <footer class="weather__temp" style="<?= $textStyle ?>">18°, Partly cloudy</footer>
  </main>
</div>

<?php get_footer() ?>