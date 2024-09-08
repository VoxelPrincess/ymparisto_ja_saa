<?php get_header(); ?>

<div id="content">
    <main class="content single-page">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <article>
                    <?php the_content();  ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="single-page__news news">
            <?php
            $the_query = new WP_Query(array(
                'category_name' => 'uutiset',
                'orderby' => 'date',
                'order' => 'desc',
                'posts_per_page' => '3'
            ));
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <aside class="news__item">
                        <header class="news__header">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </header>
                        <p class="news__date"><?php echo get_the_date(); ?></p>
                        <div class="news__teaser">
                            <?php the_excerpt() ?> <!-- Show teaser only, new function -->
                        </div>
                    </aside>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>