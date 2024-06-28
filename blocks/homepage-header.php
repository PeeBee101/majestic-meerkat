<?php 
$bg = get_sub_field('background_image');
$overlay = get_sub_field('overlay_image');
$title = get_sub_field('title');
$intro = get_sub_field('intro_text');
?>

<section class="homepage-header" style="background-image: url('<?php echo $bg['url']; ?>')">
    <div class="full-container">
        <div class="hh-content">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $intro; ?></p>
            <div class="button-box">
                <a href="services" class="blue-btn">Services</a>
                <a href="contact" class="red-btn">Contact Us</a>
            </div>
        </div>
        <div class="hh-image">
            <img src="<?php echo $overlay['url']; ?>" />
        </div>
    </div>
</section>