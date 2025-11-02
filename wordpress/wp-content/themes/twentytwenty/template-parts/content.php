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
