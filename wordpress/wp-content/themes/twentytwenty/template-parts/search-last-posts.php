<?php
/**
 * Template part: Latest posts timeline for search results.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

$search_latest_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 4,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	)
);

if ( ! $search_latest_posts->have_posts() ) {
	return;
}

?>

<section class="search-latest-posts-section" aria-labelledby="search-latest-posts-heading">
	<div class="search-latest-posts__wrapper section-inner">
		<div class="search-latest-posts__inner">
			<div class="search-latest-posts__header">
				<h2 id="search-latest-posts-heading"><?php esc_html_e( 'Latest News', 'twentytwenty' ); ?></h2>
			</div>
			<ol class="search-latest-posts__list">
			<?php
			while ( $search_latest_posts->have_posts() ) :
				$search_latest_posts->the_post();
				?>
				<li class="search-latest-posts__item">
					<span class="search-latest-posts__marker" aria-hidden="true"></span>
					<div class="search-latest-posts__content">
						<div class="search-latest-posts__title-line">
							<a class="search-latest-posts__title" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php the_title(); ?>
							</a>
							<time class="search-latest-posts__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
								<?php echo esc_html( get_the_date( 'j F, Y' ) ); ?>
							</time>
						</div>
						<p class="search-latest-posts__excerpt">
							<?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '…' ) ); ?>
						</p>
					</div>
				</li>
				<?php
			endwhile;
			?>
			</ol>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();
?>
