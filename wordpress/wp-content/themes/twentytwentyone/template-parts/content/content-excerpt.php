<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
	<div class="news-card-container">
		<div class="news-content">
			<div class="news-header">
				<div class="news-date">
					<span class="date-number"><?php echo get_the_date('d'); ?></span>
					<div class="date-text">
						<span class="month"><?php echo get_the_date('M'); ?></span>
						<span class="year"><?php echo get_the_date('Y'); ?></span>
					</div>
				</div>
				<div class="news-title-section">
					<h2 class="news-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					
					<div class="news-category">
						<?php
						$categories = get_the_category();
						if (!empty($categories)) {
							echo '<span class="category-text">Categories ' . esc_html($categories[0]->name) . '</span>';
						}
						?>
					</div>
					
					<div class="news-excerpt">
						<?php 
						$excerpt = get_the_excerpt();
						if (strlen($excerpt) > 100) {
							echo substr($excerpt, 0, 100) . '...';
						} else {
							echo $excerpt;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-${ID} -->
