<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		/**
		 * @global WP_Query $wp_query WordPress Query object.
		 */
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

	if ( have_posts() ) {

		$i = 0;

		if ( is_search() ) {
			?>
			<div class="search-page-layout">
				<aside class="search-page-column search-page-column--left">
					<?php do_action( 'twentytwenty_search_sidebar_left' ); ?>
				</aside>
				<div class="search-page-column search-page-column--results">
			<?php
		} elseif ( is_home() ) {
			$home_archives_html = wp_get_archives(
				array(
					'type'   => 'monthly',
					'limit'  => 6,
					'echo'   => false,
					'format' => 'custom',
					'before' => '<li class="home-archives__item">',
					'after'  => '</li>',
				)
			);

			$home_comments = get_comments(
				array(
					'number'  => 3,
					'orderby' => 'comment_date_gmt',
					'order'   => 'DESC',
					'status'  => 'approve',
				)
			);
			?>
			<div class="home-grid home-grid--twelve">
				<aside class="home-grid__column home-grid__column--archives">
					<section class="home-archives">
						<h2 class="home-section-title"><?php esc_html_e( 'Archive', 'twentytwenty' ); ?></h2>
						<?php if ( $home_archives_html ) : ?>
							<ul class="home-archives__list">
								<?php echo wp_kses_post( $home_archives_html ); ?>
							</ul>
						<?php else : ?>
							<p class="home-archives__empty"><?php esc_html_e( 'No archives found.', 'twentytwenty' ); ?></p>
						<?php endif; ?>
					</section>
				</aside>
				<div class="home-grid__column home-grid__column--content">
			<?php
		}

		while ( have_posts() ) {
			++$i;
			if ( $i > 1 ) {
				echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
			}
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		}

		if ( is_search() ) {
			?>
				</div><!-- .search-page-column--results -->
				<aside class="search-page-column search-page-column--comments">
					<?php get_template_part( 'template-parts/search-comments' ); ?>
				</aside>
			</div><!-- .search-page-layout -->
			<div class="search-page-latest">
				<?php get_template_part( 'template-parts/search-last-posts' ); ?>
			</div>
			<?php
		} elseif ( is_home() ) {
			?>
				</div><!-- .home-grid__column--content -->
				<aside class="home-grid__column home-grid__column--comments">
					<section class="home-comments">
						<h2 class="home-section-title"><?php esc_html_e( 'Comments', 'twentytwenty' ); ?></h2>
						<?php if ( ! empty( $home_comments ) ) : ?>
							<ul class="home-comments__list">
								<?php foreach ( $home_comments as $recent_comment ) : ?>
									<li class="home-comments__item">
										<a class="home-comments__link" href="<?php echo esc_url( get_comment_link( $recent_comment ) ); ?>">
											<?php echo esc_html( wp_trim_words( wp_strip_all_tags( $recent_comment->comment_content ), 12, '...' ) ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php else : ?>
							<p class="home-comments__empty"><?php esc_html_e( 'No comments yet.', 'twentytwenty' ); ?></p>
						<?php endif; ?>
					</section>
				</aside>
			</div><!-- .home-grid -->
			<?php
		}
	} elseif ( is_search() ) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __( 'search again', 'twentytwenty' ),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php if ( ! is_search() ) { get_template_part( 'template-parts/pagination' ); } ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
