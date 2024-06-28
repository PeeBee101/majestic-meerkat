<?php
/**
 * Block Name: Accordion
 *
 * This is the template that displays the accordion block.
 */

   // Create id attribute for specific styling
   $id = 'accordion-' . $block['id'];

   // Create align class from block setting
   $align_class = 'align' . $block['align'];
?>

<div id="<?php echo $id; ?>" class=" <?php echo $align_class; ?> custom-block accordion-block">
      <?php while(have_rows('accordion')): the_row(); ?>
         <div  class="accordion">
            <button aria-expanded="true" class="accordion__heading">
               <?php the_sub_field('accordion_heading'); ?>
            </button>
            <div class="accordion__main">
               <?php the_sub_field('accordion_content'); ?>
            </div>
         </div>
      <?php endwhile; ?>
</div>

