<?php
/**
 * Template part for displaying the account modal.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="account-modal cover-modal" data-modal-target-string=".account-modal">

	<div class="account-modal-inner modal-inner">

		<div class="section-inner">

			<?php
			$account_title = get_theme_mod( 'account_title', __( 'Account', 'twentytwenty' ) );
			?>

			<header class="modal-header">

				<button class="toggle close-account-toggle fill-children-current-color" data-toggle-target=".account-modal" data-toggle-body-class="showing-account-modal" data-set-focus=".account-toggle" aria-expanded="false">
					<span class="screen-reader-text"><?php _e( 'Close account', 'twentytwenty' ); ?></span>
					<?php twentytwenty_the_theme_svg( 'cross' ); ?>
				</button><!-- .close-account-toggle -->

				<?php if ( $account_title ) { ?>

					<h2 class="modal-title"><?php echo esc_html( $account_title ); ?></h2>

				<?php } ?>

			</header>

			<div class="modal-content">

				<?php if ( is_user_logged_in() ) : ?>

					<div class="account-logged-in">

						<p class="account-welcome">
							<?php
							$current_user = wp_get_current_user();
							printf(
								/* translators: %s: User display name. */
								__( 'Welcome, %s!', 'twentytwenty' ),
								'<strong>' . esc_html( $current_user->display_name ) . '</strong>'
							);
							?>
						</p>

						<div class="account-actions">
							<a href="<?php echo esc_url( get_edit_profile_url() ); ?>" class="account-link">
								<?php _e( 'Edit Profile', 'twentytwenty' ); ?>
							</a>
							<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="account-link">
								<?php _e( 'Logout', 'twentytwenty' ); ?>
							</a>
						</div>

					</div>

				<?php else : ?>

					<div class="account-login-form">

						<?php
						// Display login form
						wp_login_form( array(
							'redirect' => home_url(),
							'form_id' => 'account-login-form',
							'label_username' => __( 'Username or Email', 'twentytwenty' ),
							'label_password' => __( 'Password', 'twentytwenty' ),
							'label_remember' => __( 'Remember Me', 'twentytwenty' ),
							'label_log_in' => __( 'Log In', 'twentytwenty' ),
							'remember' => true,
						) );
						?>

						<div class="account-register-link">
							<p>
								<?php
								printf(
									/* translators: %s: Register URL. */
									__( 'Don\'t have an account? <a href="%s">Register here</a>.', 'twentytwenty' ),
									esc_url( wp_registration_url() )
								);
								?>
							</p>
						</div>

					</div>

				<?php endif; ?>

			</div><!-- .modal-content -->

		</div><!-- .section-inner -->

	</div><!-- .account-modal-inner -->

</div><!-- .account-modal -->
