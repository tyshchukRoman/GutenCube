<?php

$title = get_array_value($args, 'title');
$button = get_array_value($args, 'button');
$description = get_array_value($args, 'description');
$products = get_array_value($args, 'products', []);

if(empty($products)) return;

?>

<section class="products-grid | section">
    <div class="container | flow">
        <div class="products-grid__header | repel">
            <div class="flow" style="--flow-space: 1rem;">
                <?php if($title): ?>
                    <h2 class="h3"><?php echo $title ?></h2>
                <?php endif; ?>

                <?php if($description): ?>
                    <p><?php echo $description ?></p>
                <?php endif; ?>
            </div>

            <?php if($button): ?>
                <a class="button" href="<?php echo $button['url'] ?>">
                  <?php echo $button['title'] ?>
                </a>
            <?php endif; ?>
        </div>

        <ul class="products">
            <?php 
                foreach ($products as $post):
                    setup_postdata($post);
                    global $product;
                    $product = wc_get_product($post->ID);
                    wc_get_template_part('content', 'product');
                endforeach; 
            wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
