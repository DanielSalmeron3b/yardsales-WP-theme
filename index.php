<?php get_header()?>

<!-- We validate that we have posts to show -->
<?php if (have_posts()) : ?>
    <!-- If there are any posts we print the content that the start page has to show-->
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>

<!-- Calling content-list.php -->
<?php get_template_part('template-parts/content', 'list'); ?>
<?php get_footer() ?>