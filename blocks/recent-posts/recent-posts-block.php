<?php
/**
 * [name] Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 * @package devchallenge
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'recent-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-recent-posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Get ACF fields.
$posts_per_page = get_field( 'posts per page' );
$category = get_field( 'category' );


// Display Preview
if (isset($block['data']['is_preview']) && $block['data']['is_preview'] == true) :
    $preview_image = $block['data']['preview_image'];
    echo '<img src="' . $preview_image . '"/>';
else :
// Render Block
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="block-recent-posts__container">
        <h1 class="block-recent-posts__container__block-title">Recent-posts</h1>
		<div class="block-recent-posts__container__elements-list">
			<?php
				//getting current url without the /page/
				global $wp;
				$url = home_url( $wp->request);
				$url = explode("/page/",$url)[0];

				//Getting all posts
				$the_query = new WP_Query( array(
					'post_type' => array ('post'),
					'category_name' => $category,
				)); 

				//getting the count for all posts, number of pages and current page
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$total = $the_query->found_posts;
				$pages = $total/$posts_per_page;
			

				//Searching for the posts by paging and ordering by ID so it wont bug (I believe the is a problem with the default ordering caused by the dates in wp)
				$the_query = new WP_Query( array(
					'post_type' => array ('post'),
					'posts_per_page' => $posts_per_page,
					'category_name' => $category,
					'paged' => $paged,
					'orderby' => 'ID',
				)); 
			?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="element">
						<div class="element__title">
								<h3 class=""><?php the_title(); ?></h3>
							</div>

						<div class="element__content">
							<div class="element__content__thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="element__content__text">
								<?php the_excerpt(); ?>
							</div>
						</div>

						<div class="element__link">
							<a href="<?php the_permalink( ); ?>" class="">Learn More</a>
						</div>

					</div>
				<?php endwhile; ?>
				
			<?php else : ?>
				<p><?php __('No posts found'); ?></p>
			<?php endif; ?>

			<div class="block-recent-posts__container__pagination">
				<?php 
					echo paginate_links(array(
						'base'=> $url. '/page/%#%' . '/',
						'format' => '?paged=%#%',
						'current'=>$paged,
						'total'=>$pages,
						'prev_text'=>'<span>Previous<span/>',
						'next_text'=>'<span>Next<span/>',
						))
				?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>

<?php //Any minor scripts that are related to the individual block. ?>
<script>
(function($) {


})(jQuery);
</script>
