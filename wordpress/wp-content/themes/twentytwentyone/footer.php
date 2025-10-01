<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	

	<!-- Footer -->
	<section id="footer">
		<div class="container">
			<!-- Footer Widgets -->
			<div class="row">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			
					<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<h5>TRANG</h5>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-12 footer-column-2">
					<h5>BÀI VIẾT</h5>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<h5>DANH MỤC</h5>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					</div>
				<?php endif; ?>
				
				
			</div>
			
			<!-- Social Media Links -->
			<div class="row">
				<div class="col-12 text-center">
					<ul class="list-unstyled list-inline social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div>
			
			<!-- Company Info and Copyright -->
			<div class="row">
				<div class="col-12 text-center">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> 
					is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed. 
					<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- ./Footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>