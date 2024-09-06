<?php $assets = get_template_directory_uri() . '/assets'; ?>
<?php get_header() ?>

<div id="content">
  <main class="weather" style="background-image: url(<?php print $assets ?>/autumn.webp);">
    <header class="weather__slogan">
      <div>Something</div>
      <div>from Helsinki</div>
    </header>
    <footer class="weather__temp">18°, Partly cloudy</footer>
  </main>
</div>

<?php get_footer() ?>