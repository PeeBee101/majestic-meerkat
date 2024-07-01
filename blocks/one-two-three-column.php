<?php 
    $bgc = get_sub_field('background_colour');
    $title = get_sub_field('');
    $layout = get_sub_field('layout');
    $content = get_sub_field('content');
    $content2 = get_sub_feld('content2');
    $content3 = get_sub_field('content3');
?>

<section class="content-block" style="background-color: <?php echo $bgc; ?>">
    <div class="content-container">
        <h2 class="title"><?php echo $title; ?></h2>
        <div class="content-columns">
            <div class="column">
                <?php echo $content; ?>
            </div>
            <?php if ($layout == 2) { ?>
                <div class="column">
                    <?php echo $content2; ?>
                </div>
            <?php } ?>
            <?php if ($layout == 3) { ?>
                <div class="column">
                    <?php echo $content2; ?>
                </div>
                <div class="column">
                    <?php echo $content3; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>