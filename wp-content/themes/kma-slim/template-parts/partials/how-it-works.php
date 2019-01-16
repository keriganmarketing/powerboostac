<?php 
    $args = array(
        'post_type'=>'video', 
        'orderby'=>'menu_order', 
        'posts_per_page'=>'1'); 

    $videos = new WP_Query($args); 
    while ($videos->have_posts()) : $videos->the_post();
    $videoId = (get_field('youtube_id') != '' ? get_field('youtube_id') : '123456' ); 
    endwhile; wp_reset_postdata(); 
    
    ?>
    <div class="container">
    <a name="video" id="video" class="pad-anchor">&nbsp;</a>
    <div class="columns is-multiline is-aligned">
        <div class="column is-6 is-second-desktop">
            <figure class="video is-16by9 has-border has-shadow">
                <div class="embed-wrapper">
                <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $videoId; ?>?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </figure>
        </div>
        <div class="column is-6 is-first-desktop">
            <h2 class="title is-2">The science is simple.</h2>
            <p>Every AC has lubricating oil running through the unit — but when oil film and deposits cling to the inside of your copper tubing, you lose performance. KoolMaxx AC is scientifically engineered to dislodge oil fouling and prevent lubricating oil from ever reattaching to the metal surfaces again. </p>
            <p class="section-action"><a class="button is-info" href="/faqs/">FAQs</a> <a class="button is-primary" href="/videos" >More Videos</a></p>
        </div>
    </div>
</div>
