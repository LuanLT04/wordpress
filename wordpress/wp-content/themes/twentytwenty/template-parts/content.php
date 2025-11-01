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

<article <?php post_class( 'news-detail-entry' ); ?> id="post-<?php the_ID(); ?>">

    <div class="news-detail-card">
        <div class="news-detail-header">
            <div class="news-detail-title">
                <?php the_title( '<h1 class="news-detail-heading">', '</h1>' ); ?>
                <?php
                $news_detail_summary = get_the_excerpt();
                if ( ! empty( $news_detail_summary ) ) :
                    ?>
                    <p class="news-detail-summary"><?php echo esc_html( $news_detail_summary ); ?></p>
                <?php endif; ?>
            </div>
            <div class="news-detail-date">
                <span class="date-left">
                    <span class="date-day news-detail-day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
                    <span class="date-separator" aria-hidden="true"></span>
                    <span class="date-month news-detail-month"><?php echo esc_html( get_the_date( 'm' ) ); ?></span>
                </span>
                <span class="date-year news-detail-year"><?php echo esc_html( get_the_date( 'y' ) ); ?></span>
            </div>
        </div>

        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="news-detail-image">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
        <?php endif; ?>

        <div class="news-detail-body">
            <?php the_content(); ?>
        </div>

        <div class="news-detail-meta">
            <?php
            wp_link_pages(
                array(
                    'before'      => '<nav class="post-nav-links detail-nav-links" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
                    'after'       => '</nav>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                )
            );

            edit_post_link( '', '<span class="edit-link">', '</span>' );

            twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

            if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {
                get_template_part( 'template-parts/entry-author-bio' );
            }
            ?>
        </div>
    </div>

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
        <!-- Left Column: Image with Overlay -->
        <div class="news-image-column">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="news-image-wrapper">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'news-featured-image' ) ); ?>
                </div>
            <?php else : ?>
                <div class="news-image-wrapper no-image">
                    <div class="placeholder-content">
                        <div class="placeholder-title"><?php the_title(); ?></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Right Column: Content -->
        <div class="news-content-column">
            <!-- Date and Title Section -->
            <div class="news-header">
                <div class="news-date">
                    <span class="date-number"><?php echo get_the_date( 'd' ); ?></span>
                    <div class="date-text">
                        <span class="month">THÁNG <?php echo get_the_date( 'm' ); ?></span>
                        <span class="year"><?php echo get_the_date( 'Y' ); ?></span>
                    </div>
                </div>
                <div class="news-title-section">
                    <h2 class="news-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="news-excerpt">
                        <?php
                        $excerpt = get_the_excerpt();
                        if ( strlen( $excerpt ) > 150 ) {
                            echo esc_html( mb_substr( wp_strip_all_tags( $excerpt ), 0, 150 ) ) . '...';
                        } else {
                            echo esc_html( $excerpt );
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Social and Live Button -->
           
        </div>
    </div>
</article><!-- #post-${ID} -->

<?php endif; ?>
