<?php

$about_content = get('faq-about__about-content');
$contacts_content = get('faq-about__contacts-content');
$about_image = get('faq-about__about-image');
$faq_title = get('faq-about__faq-title');
$faq_image = get('faq-about__faq-image');
$faq_list = get('faq-about__faq-list');

?>

<section class="faq-about | section" id="about">
    <div class="container | flow">
        <div class="faq-about__about auto-grid" data-layout="50-50">
            <div class="faq-about__about-content | flow">
                <?php if($about_content): ?>
                    <div class="box content">
                        <?php echo $about_content ?>
                    </div>
                <?php endif; ?>

                <?php if($contacts_content): ?>
                    <div class="box content" id="contacts">
                        <?php echo $contacts_content ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if($about_image): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($about_image, 'medium', false, [
                      'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="faq-about__faq auto-grid" data-layout="50-50" id="faq">
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
                        'variant' => 'primary'
                    ]); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
