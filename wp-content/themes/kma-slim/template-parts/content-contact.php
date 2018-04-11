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
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <?php the_content(); ?>
                        <p>&nbsp;</p>
                       
                    </div>
                    <div class="column is-12 is-4-desktop">
                        <div class="entry-content content">
                            <p class="title is-3 is-primary">Need Help?</p>
                            <p class="subtitle is-5">Here’s how to get in touch with a customer service agent. And remember, with PowerBoost AC, you won’t have to schedule a technician to come out and install the product, because the technician is you.</p>
                        </div>
                    </div>
                    <div class="column is-1">
                    </div>
                    <div class="column is-12 is-7-desktop">
                        <div class="entry-content content has-sidebar">
                            <div class="columns is-multiline">
                                <div class="column has-text-centered">
                                    <div class="icon is-large is-info">
                                        <i class="fa fa-comments-o is-info" aria-hidden="true"></i>
                                    </div>
                                    <p></p>
                                    <p class="title is-4 is-info">Stay Connected</p>
                                    <p class="subtitle is-6"><a href="#" >Facebook</a> &nbsp; <a href="#" >YouTube</a></p>
                                </div>
                                <div class="column has-text-centered">
                                    <div class="icon is-large is-info">
                                        <i class="fa fa-envelope-open-o is-info" aria-hidden="true"></i>
                                    </div>
                                    <p></p>
                                    <p class="title is-4 is-info">Reach Out</p>
                                    <p class="subtitle is-6 is-primary">Submit the Form Below</p>
                                </div>
                            </div>

                            <hr>
                            <?php echo do_shortcode('[contact_form]'); ?>
                        </div>
                    </div>
                </div>
        </section>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
