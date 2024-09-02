<?php get_header(); ?>

<div id="content">
  <main>
    <div id="testi">
      <h1>Ketä me olemme</h1>
      <P>Me olemme kuvaus ja tähän tekstiä ja kuva.</P>
    </div>

    <div id="news-box">
      <?php
      $the_query = new WP_Query(array(
        'category_name' => 'uutiset',
        'orderby' => 'date',
        'order' => 'desc',
        'posts_per_page' => '3'
      ));
      ?>

      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : ?>
          <?php $the_query->the_post(); ?>
          <div class="news">
            <h2>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h2>
            <p class="date"><?php echo get_the_date(); ?></p>
            <?php the_content();  ?>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p>Ei kirjoituksia.</p>
      <?php endif; ?>
    </div>
  </main>
  <?php get_sidebar(); ?>
</div> <!-- content -->

<?php get_footer(); ?>