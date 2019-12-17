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
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <?php echo do_shortcode('[product_categories]'); ?>
            </div>
            <aside class="col-12 col-md-3">
                <?php wp_loginout(get_permalink()); ?>
                <?php 
                    if(!is_user_logged_in()) {
                        $args = array(
                            'echo' => false,
                            'label_password' => '',
                            'label_username' => '',
                        );
                        
                        $form = wp_login_form( $args ); 
                        
                        //add the placeholders
                        $form = str_replace('name="log"', 'name="log" placeholder="Username"', $form);
                        $form = str_replace('name="pwd"', 'name="pwd" placeholder="Password"', $form);
                        
                        echo $form; 
                    }
                ?>
            </aside>
        </div>
    </div>
</section>
<section id="blog-section">
    <div class="container">
        <div class="row">
            <?php $posts = new WP_Query([
                'posts_per_page' => 3.
            ]);
             if($posts->have_posts()) :
                 while($posts->have_posts()) : 
                     $posts->the_post(); ?>
                <div class="col-12 col-md-4 mb-5">
                    <div class="card card-content shadow-lg p-3">
                        <h2 class="text-center post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <small class="text-center categories">Categories</small>
                        <?php the_category(); ?>
                        <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
                        <?php the_tags( null, '' ); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>