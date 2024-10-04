<?php get_header(); ?>

<?php
$event_start = get_post_meta(get_the_ID(), '_evcatalog_meta_start_datetime', true);
$event_end = get_post_meta(get_the_ID(), '_evcatalog_meta_end_datetime', true);
$event_location = get_post_meta(get_the_ID(), '_evcatalog_meta_place', true);
$event_link = get_post_meta(get_the_ID(), '_evcatalog_meta_link', true);
?>

<div id="content">
    <main class="content single-post">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="single-post__content">
                    <div class="the-event__info">
                        <aside class="single-post__image">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </aside>

                        <div>
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

                            <div class="the-event__meta">
                                <span class="the-event__start">
                                    Start date: <?php echo $event_start; ?>
                                </span>

                                <span class="the-event__end">
                                    End date: <?php echo $event_end; ?>
                                </span>

                                <span class="the-event__location">
                                    Location: <?php echo $event_location; ?>
                                </span>

                                <span class="the-event__link">
                                    <a href="<?php echo esc_url($event_link); ?>" target="_blank">
                                        Buy ticket
                                    </a>
                                </span>
                            </div>
                        </div>
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