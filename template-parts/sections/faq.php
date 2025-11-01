<?php

$about_image = get('faq__about-image');
$faq_subtitle = get('faq__faq-subtitle');
$faq_title = get('faq__faq-title');
$faq_image = get('faq__faq-image');
$faq_list = get('faq__faq-list');

?>

<section class="faq | section">
    <div class="container | flow">
        <div class="faq__faq auto-grid" data-layout="50-50" id="faq-secondary">  <!-- or id="faq" -->
            <?php if($faq_image): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($faq_image, 'medium', false, [
                      'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($faq_list)): ?>
                <div class="box">
                    <?php get_template_part('template-parts/parts/accordion', null, [
                        'title' => $faq_title,
                        'list' => $faq_list,
                        'variant' => 'secondary'
                    ]); ?> <!-- or 'variant' => 'primary' -->
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
