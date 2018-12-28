<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <?php include(locate_template('template-parts/sections/home-header.php')); ?>
    <div class="section big-features">
        <?php include(locate_template('template-parts/partials/big-features.php')); ?>
    </div>

    <div class="section how-it-works">
        <?php include(locate_template('template-parts/partials/how-it-works.php')); ?>
    </div>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
