 <?php 
    global $sa_options;
    $sa_settings = get_option( 'sa_options', $sa_options );
?>           
            <footer class="footer" role="contentinfo">
                <hr/>
                
                <?php wp_nav_menu( array( 
                'container_class' => 'menu-bottom', 
                'theme_location' => 'bottom', 
                'menu_class' => 'nav nav-pills', 
                'fallback_cb' => false) );  ?>
                
                <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
                <p class="muted">Powered by <a href="http://wordpress.org">Wordpress</a> - Theme <a class="label label-info" href="http://victorpuertas.github.com/Boopress/">Boopress</a></p>
            </footer>
        
        </div> <!-- end #container -->
        
        <script>
            $(document).ready(function(){
              <?php if ( strlen($sa_settings['image_effect_class']) > 0 ): ?>
              $('article img').addClass('<?php echo $sa_settings['image_effect_class'] ?>');
              <?php endif; ?>
              $('img.avatar').addClass('img-rounded');
              $('input[type=submit]').addClass('btn');
              prettyPrint();
            });
        </script>
        
        <?php wp_footer(); ?>
    </body>
</html>
