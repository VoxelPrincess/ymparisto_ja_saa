<?php get_header(); ?>

<div id="content">
    <main class="content single-post">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post__content">
                    <header class="single-post__title">
                        <?php the_title(); ?>
                    </header>

                    <p class="single-post__meta">
                        <span class="single-post__date">
                            <?php echo get_the_date(); ?>
                        </span>

                        <span class="single-post__category">
                            <?php echo get_the_category_list(', '); ?>
                        </span>
                    </p>
                    <?php the_content();  ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>