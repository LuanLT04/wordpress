<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<?php if ( is_singular() ) : ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php
    get_template_part( 'template-parts/entry-header' );

    if ( ! is_search() ) {
        get_template_part( 'template-parts/featured-image' );
    }
    ?>

    <div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">
        <div class="entry-content">
            <?php
            if ( is_search() ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
            ?>
        </div><!-- .entry-content -->
    </div><!-- .post-inner -->

    <div class="section-inner">
        <?php
        wp_link_pages(
            array(
                'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
                'after'       => '</nav>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            )
        );

        edit_post_link();

        twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

        if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {
            get_template_part( 'template-parts/entry-author-bio' );
        }
        ?>
    </div><!-- .section-inner -->

    <?php
    if ( is_single() ) {
        get_template_part( 'template-parts/navigation' );
    }

    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
        ?>
        <div class="comments-wrapper section-inner">
            <?php comments_template(); ?>
        </div><!-- .comments-wrapper -->
        <?php
    }
    ?>

</article><!-- .post -->

<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-card' ); ?>>
    <div class="news-card-container">
        <div class="news-content">
            <div class="news-header">
                <div class="news-date">
                    <span class="date-number"><?php echo get_the_date( 'd' ); ?></span>
                    <div class="date-text">
                        <span class="month"><?php echo 'TH' . get_the_date( 'm' ); ?></span>
                        <span class="year"><?php echo get_the_date( 'Y' ); ?></span>
                    </div>
                </div>
                <div class="news-title-section">
                    <h2 class="news-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="news-category">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<span class="category-text">Categories ' . esc_html( $categories[0]->name ) . '</span>';
                        }
                        ?>
                    </div>
                    <div class="news-excerpt">
                        <?php
                        $excerpt = get_the_excerpt();
                        if ( strlen( $excerpt ) > 100 ) {
                            echo esc_html( mb_substr( wp_strip_all_tags( $excerpt ), 0, 100 ) ) . '...';
                        } else {
                            echo esc_html( $excerpt );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-${ID} -->

<?php endif; ?>
