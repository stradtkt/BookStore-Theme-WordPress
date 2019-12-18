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
    <?php  get_sidebar(); ?>
</aside>