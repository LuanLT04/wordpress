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

    <?php
    $news_categories       = get_categories(
        array(
            'orderby'    => 'name',
            'hide_empty' => false,
        )
    );
    $news_categories_count = $news_categories ? count( $news_categories ) : 0;
    $news_recent_posts     = wp_get_recent_posts(
        array(
            'numberposts' => 5,
            'post_status' => 'publish',
        )
    );
    $news_recent_count     = (int) wp_count_posts()->publish;
    ?>

    <div class="news-single-layout">
        <aside class="news-sidebar news-sidebar--left">
            <div class="news-sidebar-block news-sidebar-block--categories">
                <h2 class="news-sidebar-heading">
                    <?php esc_html_e( 'Categories', 'twentytwenty' ); ?>
                    <?php if ( $news_categories_count ) : ?>
                        <span class="news-sidebar-count"><?php echo esc_html( $news_categories_count ); ?></span>
                    <?php endif; ?>
                </h2>
                <?php if ( $news_categories ) : ?>
                    <ul class="news-sidebar-list news-categories-list">
                        <?php foreach ( $news_categories as $category ) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
                                    <?php echo esc_html( $category->name ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p class="news-sidebar-empty"><?php esc_html_e( 'No categories found.', 'twentytwenty' ); ?></p>
                <?php endif; ?>
            </div>
        </aside>

        <div class="news-single-main">
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

            </article><!-- .post -->
        </div>

        <aside class="news-sidebar news-sidebar--right">
            <div class="news-sidebar-block news-sidebar-block--recent">
                <?php if ( $news_recent_posts ) : ?>
                    <?php
                    $news_recent_archive = get_post_type_archive_link( 'post' );
                    if ( ! $news_recent_archive ) {
                        $news_recent_archive = home_url( '/' );
                    }
                    ?>
                    <div class="news-recent-panel">
                        <div class="news-recent-card">
                            <div class="news-recent-items">
                                <?php foreach ( $news_recent_posts as $news_recent_post ) : ?>
                                    <?php
                                    $recent_post_id = $news_recent_post['ID'];
                                    $recent_day     = get_the_date( 'd', $recent_post_id );
                                    $recent_month   = get_the_date( 'm', $recent_post_id );
                                    $recent_year    = get_the_date( 'y', $recent_post_id );
                                    ?>
                                    <a class="news-recent-item" href="<?php echo esc_url( get_permalink( $recent_post_id ) ); ?>">
                                        <span class="news-recent-date" aria-hidden="true">
                                            <span class="news-recent-date-main">
                                                <span class="news-recent-day"><?php echo esc_html( $recent_day ); ?></span>
                                                <span class="news-recent-month"><?php echo esc_html( $recent_month ); ?></span>
                                            </span>
                                            <span class="news-recent-year"><?php echo esc_html( $recent_year ); ?></span>
                                        </span>
                                        <span class="news-recent-title"><?php echo esc_html( get_the_title( $recent_post_id ) ); ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a class="news-recent-all" href="<?php echo esc_url( $news_recent_archive ); ?>">
                                <?php esc_html_e( 'Xem tất cả tin tức', 'twentytwenty' ); ?>
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <p class="news-sidebar-empty"><?php esc_html_e( 'No recent posts available.', 'twentytwenty' ); ?></p>
                <?php endif; ?>
            </div>
        </aside>
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

    wp_reset_postdata();
    ?>

<?php else : ?>


<div class="news-listing-layout">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'news-card' ); ?> >
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
    </article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .news-listing-layout -->

<?php endif; ?>
