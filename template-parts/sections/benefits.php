<?php

$benefits_subtitle = get('benefits-subtitle');
$benefits_title = get('benefits-title');
$benefits_image = get('benefits-image');
$benefits_list = get('benefits_content-list');
$button = get('benefits-button');
?>

<section class="benefits | section">
    <div class="container | flow">
        <?php if($benefits_title): ?>
            <h2 class="benefits__title">
                <?php echo $benefits_title ?>
            </h2>
        <?php endif; ?>

        <?php if($benefits_subtitle): ?>
            <p class="benefits__subtitle">
                <?php echo $benefits_subtitle ?>
            </p>
        <?php endif; ?>

        <div class="benefits__container auto-grid" data-layout="50-50" id="benefits">  <!-- or id="faq" -->
            <?php if(!empty($benefits_list)): ?>
                <div class="box">
                    <div class="benefits-container">
                        <?php foreach ($benefits_list as $item): 
                            $title = $item['title'];
                            $description = $item['content'];
                        ?>
                            <div class='benefits-item'>
                                <?php if($title): ?>
                                    <p class="benefits-item__title">
                                        <?php echo $title ?>
                                    </p>
                                <?php endif; ?>

                                <?php if($description): ?>
                                    <p class="benefits-item__content">
                                        <?php echo $description ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                        
                    <?php if($button): ?>
                        <a class="button" href="<?php echo $button['url'] ?>">
                            <?php echo $button['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($benefits_image): ?>
                <div class="box">
                    <?php echo wp_get_attachment_image($benefits_image, 'medium', false, [
                        'loading' => 'lazy'
                    ]) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
