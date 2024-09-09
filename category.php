<?php get_header(); ?>

<div id="content">
    <main class="content single-category">
        <!-- get_queried_object() - retrieves the current category object being viewed, including name and description.-->
        <header class="single-category__title">
            <?php echo get_queried_object()->name; ?>

            <span class="single-category__children">
                <!-- get_term_children($id, $type) -retrieves the child categories (subcategories) of the current category based on ID and taxonomy type. -->
                <?php
                $id = get_queried_object()->term_id;
                $type = get_queried_object()->taxonomy;
                $subcats = get_term_children($id, $type)
                ?>
                <?php foreach ($subcats as $cat): ?>
                    <!-- get_term_by('id', $cat, $type) - retrieves information about a specific category by its ID.
 -->
                    <?php $cat_object = get_term_by('id', $cat, $type); ?>
                    <!-- get_term_link($cat, $type)- // Generates a link to the category or term page. -->
                    <a href="<?php echo get_term_link($cat, $type); ?>"><?php echo $cat_object->name; ?></a>
                <?php endforeach; ?>
            </span>
        </header>

        <p><?php echo get_queried_object()->description; ?></p>

        <div class="single-category__posts">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-post single-category__post">
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

                        <?php the_excerpt();  ?>
                    </article>
                    <hr>
                <?php endwhile; ?>
            <? else: ?>
                <p>Ei kirjoituksia.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>