<?php
/**
 * Template part: Comments showcase for search results sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

$recent_comments = get_comments(
	array(
		'number'  => 5,
		'orderby' => 'comment_date_gmt',
		'order'   => 'DESC',
		'status'  => 'approve',
	)
);

if ( empty( $recent_comments ) ) {
	return;
}

?>

<section class="search-comments">
	<ul class="search-comments__list">
		<?php foreach ( $recent_comments as $comment ) :
			$author_link = get_comment_author_link( $comment );
			$avatar      = get_avatar( $comment, 56, '', '', array( 'class' => 'search-comments__avatar' ) );
			?>
			<li class="search-comments__item">
				<?php if ( $avatar ) : ?>
					<div class="search-comments__avatar-wrap"><?php echo wp_kses_post( $avatar ); ?></div>
				<?php endif; ?>
				<div class="search-comments__content">
					<div class="search-comments__titlebar">
						<span class="search-comments__author"><?php echo wp_kses_post( $author_link ); ?></span>
					</div>
					<div class="search-comments__body">
						<p class="search-comments__excerpt">
							<?php echo esc_html( wp_trim_words( wp_strip_all_tags( $comment->comment_content ), 50, '…' ) ); ?>
						</p>
					</div>
					<?php
					// Replies for this comment (approved only).
					$child_comments = get_comments(
						array(
							'parent'  => $comment->comment_ID,
							'status'  => 'approve',
							'orderby' => 'comment_date_gmt',
							'order'   => 'ASC',
						)
					);
					if ( $child_comments ) :
						?>
						<ul class="search-comments__replies">
							<?php foreach ( $child_comments as $reply ) :
								$reply_author = get_comment_author_link( $reply );
								$reply_avatar = get_avatar( $reply, 28, '', '', array( 'class' => 'search-comments__avatar search-comments__avatar--reply' ) );
								?>
								<li class="search-comments__reply">
									<?php if ( $reply_avatar ) : ?>
										<div class="search-comments__avatar-wrap search-comments__avatar-wrap--reply"><?php echo wp_kses_post( $reply_avatar ); ?></div>
									<?php endif; ?>
									<div class="search-comments__reply-content">
										<div class="search-comments__titlebar search-comments__titlebar--reply">
											<span class="search-comments__author search-comments__author--reply"><?php echo wp_kses_post( $reply_author ); ?></span>
										</div>
										<div class="search-comments__body search-comments__reply-body">
											<p class="search-comments__excerpt search-comments__excerpt--reply">
												<?php echo esc_html( wp_trim_words( wp_strip_all_tags( $reply->comment_content ), 50, '…' ) ); ?>
											</p>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php
					endif;
					?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
