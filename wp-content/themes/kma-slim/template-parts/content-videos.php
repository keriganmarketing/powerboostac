<?php

use Includes\Modules\Layouts\Layouts;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
        <?php include(locate_template('template-parts/partials/breadcrumbs.php')); ?>
        <section id="content" class="section support">
            <div class="container">
                <div class="entry-content content">
                    <?php
                    the_content();
                    ?>
                </div>
                <div class="video-section pb-4 pt-2">
                    <div class="columns is-multiline">
                        <?php 
                            $args=array(
                                'post_type'=>'video', 
                                'orderby'=>'menu_order', 
                                'posts_per_page'=>'-1'); 

                            $videos = new WP_Query($args); 
                            while ($videos->have_posts()) : $videos->the_post(); ?>
                                    
                            <div class="column is-half-desktop">
                                <div class="video-container">
                                    <iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_id'); ?>?modestbranding=1&color=white&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item" ></iframe>
                                </div>
                                <p><?php the_title(); ?></p>
                            </div>
                                
                            <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>