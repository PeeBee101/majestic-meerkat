<?php 
$bgc = get_sub_field('background_colour');
?>

<section class="services-block" style="background-color: <?php echo $bgc; ?>">
    <div class="content-container">
        <div class="services-container">
            <?php if( have_rows('services') ) {
                while( have_rows('services') ) {
                    the_row(); ?>
                    <?php $title = get_sub_field('service_title');
                    $image = get_sub_field('service_image');
                    $link = get_sub_field('service_link'); ?>
                    <div class="service-block">
                        <a href="<?php echo $link; ?>">
                            <h2><?php echo $title; ?></h2>
                            <div class="service-image">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                            </div>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>