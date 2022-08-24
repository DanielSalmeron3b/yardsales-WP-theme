<?php get_header()
?>

<!-- We validate that we have posts to show -->
<?php if (have_posts()) : ?>
    <!-- If there are any posts we print the content that the start page has to show-->
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <!-- Some personalizations with bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <?php the_content(); ?>
                </div>
                <div class="col-12 col-md-6">
                    <?php the_post_thumbnail("large"); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>