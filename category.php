<?php get_header(); ?>

<div id="content">
    <main class="content single-category">
        <h2><?php echo get_queried_object()->name; ?></h2>
        <p><?php echo get_queried_object()->description; ?></p>

        <div class="single-category__info">
            <?php
            $id = get_queried_object()->term_id;
            $type = get_queried_object()->taxonomy;
            $subcats = get_term_children($id, $type);
            ?>
            <?php foreach ($subcats as $cat): ?>
                <?php $cat_object = get_term_by('id', $cat, $type); ?>
                <section>
                    <h3><a href="<?php echo get_term_link($cat, $type); ?>"><?php echo $cat_object->name; ?></a></h3>
                    <p><?php echo $cat_object->description ?></p>
                </section>
            <?php endforeach; ?>
        </div>

        <div class="single-category__posts">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="date-category"><?php echo get_the_date(); ?> | <?php echo get_the_category_list(', '); ?></p>
                        <?php the_excerpt();  ?>
                    </article>
                <?php endwhile; ?>
            <? else: ?>
                <p>Ei kirjoituksia.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>