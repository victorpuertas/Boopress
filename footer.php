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
        
        <?php if( $sa_settings['social_buttons'] == '1' ) : ?>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            <script type="text/javascript">
              window.___gcfg = {lang: 'es'};
            
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>
        <?php endif; ?>

        
        <?php wp_footer(); ?>
    </body>
</html>
