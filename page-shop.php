<?php
// Template Name: Shop Page
get_header();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <?php echo do_shortcode('[products]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>