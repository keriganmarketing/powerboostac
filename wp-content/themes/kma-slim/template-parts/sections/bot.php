<?php

use Includes\Modules\Social\SocialSettingsPage;

?>
    <div class="sticky-footer">
        <div class="section call-to-action">
            <?php 
               include(locate_template('template-parts/partials/call-to-action.php')); 
            ?>
        </div>
        <div id="bot">
            <div class="container">
                <div class="columns is-aligned">
                    <div class="column is-3">
                        <?php wp_nav_menu([
                            'theme_location' => 'footer-menu',
                            'container'      => false,
                            'menu_class'     => 'footer-navigation-menu',
                            'fallback_cb'    => '',
                            'menu_id'        => '',
                            'link_before'    => '',
                            'link_after'     => '',
                            'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>'
                        ]); ?>
                    </div>
                    <div class="column is-6 has-text-centered footer-logo-container">
                        <img class="footer-logo" src="<?php echo get_template_directory_uri() . '/img/logorev.png'; ?>">
                    </div>
                    <div class="column is-3">
                        <h4><a href="/faqs/">FAQs</a></h4>
                        <h4><a href="/videos/">Videos</a></h4>
                        <!-- <h5 class="is-flex is-aligned"><span>Connect: </span><span class="social has-text-left">
                                    <?php
                                    // $socialLinks = new SocialSettingsPage();
                                    // $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                                    // if (is_array($socialIcons)) {
                                    //     foreach ($socialIcons as $socialId => $socialLink) {
                                    //         echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                                    //     }
                                    // }
                                    ?>
                                </span></h5> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="bot-bot">
            <?php include(locate_template('template-parts/partials/copyright.php')); ?>
        </div>
    </div><!-- .sticky-footer -->
    </div><!-- .site-wrapper -->
    </div><!-- .app -->
<?php wp_footer(); ?>