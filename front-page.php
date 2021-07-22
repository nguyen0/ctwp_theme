<?php
get_header() ?>

<?php if( have_rows('components') ): ?>
    <?php while( have_rows('components') ): the_row(); ?>
        <?php if( get_row_layout() == 'heading' ): ?>
            <?php get_template_part('template-parts/components/heading'); ?>
        <?php elseif( get_row_layout() == 'slider_celano' ): ?>
            <?php get_template_part('template-parts/components/slider', 'celano'); ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer()
 ?>