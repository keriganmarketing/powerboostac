<?php

use Includes\Modules\Social\SocialSettingsPage;
use Includes\Modules\Navwalker\BulmaNavwalker;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
?>
<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'kmaslim'); ?></a>
<div id="app" :class="['app', {'modal-open': modalOpen }]">
    <div id="MobileNavMenu" :class="['navbar', { 'is-active': isOpen }]">
        <div class="nav-wrapper">
            <?php wp_nav_menu([
                'theme_location' => 'mobile-menu',
                'container'      => false,
                'menu_class'     => 'navbar-start',
                'fallback_cb'    => '',
                'menu_id'        => 'mobile-menu',
                'link_before'    => '',
                'link_after'     => '',
                'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
                'walker'         => new BulmaNavwalker()
            ]); ?>
            <div class="navbar-close" id="MobileNavClose" data-target="MobileNavMenu" @click="toggleMenu">
                <span class="delete"></span>&nbsp;close menu
            </div>
        </div>
    </div>
    <div :class="['site-wrapper', { 'menu-open': isOpen }, {'full-height': footerStuck }, {'scrolling': isScrolling }]">
        <div id="top" class="header">
            <div class="top-one">
                <div class="container">
                    <nav class="navbar navbar-top-row">
                        <div class="navbar-brand">
                            <a href="/">
                                <img class="logo" src="<?php echo get_template_directory_uri() . '/img/logo@2x.png'; ?>"
                                     alt="<?= bloginfo(); ?>">
                            </a>
                        </div>
                        <div class="navbar-middle is-hidden-mobile">
                            <img class="tagline" src="<?php echo get_template_directory_uri() . '/img/tagline.png'; ?>">
                        </div>
                        <div class="navbar-end mini-nav is-hidden-mobile">
                            <div class="navbar-item">
                                <a href="/cart/">
                                    <span class="icon is-small">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="navbar-item seperator">|</div>
                            <div class="navbar-item">
                                Connect:
                            </div>
                            <div class="navbar-item social-buttons">
                                <div class="social has-text-left">
                                    <?php
                                    $socialLinks = new SocialSettingsPage();
                                    $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                                    if (is_array($socialIcons)) {
                                        foreach ($socialIcons as $socialId => $socialLink) {
                                            echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="top-two">
                <div class="container">
                    <nav class="navbar navbar-bottom-row">
                        <div class="burger button is-info is-outlined" id="MobileNavBurger" data-target="MobileNavMenu"
                             @click="toggleMenu">
                            <span class="burger-label">Menu</span>
                            <span class="navbar-burger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                        </div>
                        <?php wp_nav_menu([
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-start main-navigation-menu',
                            'fallback_cb'    => '',
                            'menu_id'        => 'main-menu',
                            'link_before'    => '',
                            'link_after'     => '',
                            'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
                            'walker'         => new BulmaNavwalker()
                        ]); ?>
                        <div class="navbar-end">
                            <a class="button is-primary" href="/product/power-boost-kit/">Buy Now</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

