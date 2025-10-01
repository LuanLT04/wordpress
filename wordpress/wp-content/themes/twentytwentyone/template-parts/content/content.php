<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( is_singular() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php	
		the_content(
			twenty_twenty_one_continue_reading_text()
		);

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php else : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-item'); ?>>
	<div class="blog-post-container">
		<div class="blog-post-date">
			<div class="date-day"><?php echo get_the_date('d'); ?></div>
			<div class="date-month"><?php echo get_the_date('M'); ?></div>
		</div>
		
		<div class="blog-post-content">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-excerpt">
				<?php 
				if ( has_excerpt() ) {
					the_excerpt();
				} else {
					echo wp_trim_words( get_the_content(), 30, '...' );
				}
				?>
			</div><!-- .entry-excerpt -->

			<div class="entry-meta">
				<span class="posted-on">
					<?php echo get_the_date('d/m/Y'); ?>
				</span>
				<?php if ( has_category() ) : ?>
					<span class="cat-links">
						<?php 
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo esc_html( $categories[0]->name );
						}
						?>
					</span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>
