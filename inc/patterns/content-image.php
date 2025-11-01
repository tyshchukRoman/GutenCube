<?php
/**
 * Register block patterns
 */
function gutencube_register_block_patterns() {
	// Register pattern category
	register_block_pattern_category(
		'gutencube',
		array(
			'label' => __( 'GutenCube', 'gutencube' ),
		)
	);

	// Register the pattern
	register_block_pattern(
		'gutencube/content-image',
		array(
			'title'       => __( 'Content | Image', 'gutencube' ),
			'description' => __( 'A two-column section with image and content', 'gutencube' ),
			'categories'  => array( 'gutencube' ),
			'content'     => gutencube_content_image_pattern(),
		)
	);
}
add_action( 'init', 'gutencube_register_block_patterns' );

/**
 * Content with Image pattern
 *
 * @return string Pattern content
 */
function gutencube_content_image_pattern() {
	$image_url = esc_url( get_template_directory_uri() . '/src/assets/images/placeholder.jpg' );
	$image_alt = esc_attr__( 'Descriptive alt text', 'gutencube' );

	ob_start();
	?>
<!-- wp:group {"tagName":"section","metadata":{"categories":["gutencube"],"patternName":"gutencube/content-image","name":"Content with Image"},"className":"content-image section","layout":{"type":"constrained"}} -->
<section class="wp-block-group content-image section">
	<!-- wp:group {"className":"container flow","layout":{"type":"constrained"}} -->
	<div class="wp-block-group container flow">
		<!-- wp:heading {"fontSize":"h2"} -->
		<h2 class="wp-block-heading has-h-2-font-size">Content with Image</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"md"} -->
		<p class="has-md-font-size">A compelling subtitle that describes your section</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"content-image__container","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"25rem"}} -->
		<div class="wp-block-group content-image__container">
			<!-- wp:group {"className":"image-box","layout":{"type":"constrained"}} -->
			<div class="wp-block-group image-box">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full">
					<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"/>
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"box content","layout":{"type":"constrained"}} -->
			<div class="wp-block-group box content">
				<!-- wp:heading {"level":3,"fontSize":"h3"} -->
				<h3 class="wp-block-heading has-h-3-font-size">About Us</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"md"} -->
				<p class="has-md-font-size">We believe everyone deserves access to high-quality vitamins and supplements. Our carefully curated selection features only trusted brands with proven ingredients and third-party testing.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
	<?php
	return ob_get_clean();
}
