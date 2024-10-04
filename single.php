<?php get_header(); ?>

<div id="content">
    <main class="content single-post">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post__content">
                    <aside class="single-post__image">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                    </aside>

                    <header class="single-post__title">
                        <?php the_title(); ?>
                    </header>

                    <div class="single-post__meta">
                        <span class="single-post__date">
                            <?php echo get_the_date(); ?>
                        </span>

                        <span class="single-post__category">
                            <?php echo get_the_category_list(', '); ?>
                        </span>
                    </div>

                    <div class="single-post__content">
                        <?php the_content();  ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>