<?php 
$leftOrRight = get_sub_field('left_or_right_image');
$image = get_sub_field('image'); 
$textTitle = get_sub_field('text_title');
$textContent = get_sub_field('text_content');
$includeButton = get_sub_field('include_button');
if ($includeButton == "Yes") {
    $buttonText = get_sub_field('button_text');
    $intExt = get_sub_field('internal_or_external_link');
    if ($intExt == "Internal") {
        $buttonURLint = get_sub_field('button_url_int'); 
    } else {
        $buttonURLext = get_sub_field('button_url_ext'); 
    }
}
?>

<section class="image-and-text">
    <div class="small-container" style="flex-direction: <?php echo $leftOrRight; ?>">
        <div class="image-text-img">
            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
        </div>
        <div class="image-text-content">
            <?php if ($textTitle) { ?>
                <h2><?php echo $textTitle; ?></h2>
            <?php } ?>
            <?php if( $textContent ) { ?>
                <?php echo $textContent; ?>
            <?php } ?>
            <?php if ($includeButton == "Yes") { ?>
                <?php if ($intExt == "Internal") { ?>
                    <a href="<?php echo $buttonURLint; ?>" class="cta"><?php echo $buttonText; ?></a>
                <?php } else { ?>
                    <a href="<?php echo $buttonURLext; ?>" class="cta"><?php echo $buttonText; ?></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>