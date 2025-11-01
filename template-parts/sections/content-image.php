<?php

$content_subtitle = get('content-subtitle');
$content_title = get('content-title');
$content_image = get('content-image_image');
$content_content = get('content-image_content');
$button = get('content-button');
?>

<section class="content-image | section">
    <div class="container | flow">
        <?php if($content_title): ?>
            <h2 class="content-image__title">
                <?php echo $content_title ?>
            </h2>
        <?php endif; ?>

        <?php if($content_subtitle): ?>
            <p class="content-image__subtitle">
                <?php echo $content_subtitle ?>
            </p>
        <?php endif; ?>

        <div class="content-image__container auto-grid" data-layout="50-50" id="content-image"> 
            <?php if($content_image): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($content_image, 'medium', false, [
                        'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($content_content)): ?>
                <div class="box | content-image__content | content">
                    <?php echo $content_content ?>
                        
                    <?php if($button): ?>
                        <a class="button" href="<?php echo $button['url'] ?>">
                            <?php echo $button['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
