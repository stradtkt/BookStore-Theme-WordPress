<?php


/**
 * Template Name: Home
 */

get_header();
?>

<section id="header-homepage">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-box">
                    <h1 class="text-center"><?php bloginfo('name'); ?></h1>
                    <p class="text-center"><?php bloginfo('description'); ?></p>
                    <button style="display: block; margin: 0 auto;" class="btn btn-primary"><a class="text-white" href="<?php site_url('/contact'); ?>">Contact</a></button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="category-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-9">
                <?php echo do_shortcode('[product_categories]'); ?>
                <?php $posts = new WP_Query([
                'posts_per_page' => 3,
            ]);
                    if($posts->have_posts()) :
                        while($posts->have_posts()) : 
                            $posts->the_post(); ?>
                        <div class="card card-content shadow-lg p-1 post-card post-<?php the_ID(); ?>">
                        <h2 class="text-center post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <small class="text-center categories">Categories</small>
                        <?php the_category(); ?>
                        <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
                        <?php the_tags( null, '' ); ?>
                    </div>
            <?php endwhile; endif; ?>
            </div>
            <?php get_template_part('template-parts/content', 'sidebar'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>