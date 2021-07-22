<?php
    $text       = get_sub_field('text');
    $tag        = get_sub_field('tag');
    $textAlign  = get_sub_field('text_align');
    $fontSize   = get_sub_field('font_size');
?>
<div class="heading">
    <div class="inner">
        <<?= $tag ?> class="<?= esc_html('text-') . esc_html($textAlign); ?>" style="font-size: <?= esc_html($fontSize) . 'px' ?>;" >
            <?= $text; ?>
        </<?= $tag ?>>
    </div>
</div>