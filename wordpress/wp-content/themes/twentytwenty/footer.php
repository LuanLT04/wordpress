<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>


<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style>
	/* Footer Styles */
#footer {
    background: #007b5e !important;
    padding: 40px 0 20px;
    color: #ffffff;
    font-family: Arial, sans-serif;
}

#footer h5 {
    padding-left: 10px;
    border-left: 3px solid #ffffff;
    padding-bottom: 8px;
    margin-bottom: 15px;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
}

#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    transition: all 0.3s ease;
}

#footer a:hover {
    color: #eeeeee;
    text-decoration: none;
}

/* Main navigation links styling - MŨI TÊN GIỐNG BAN ĐẦU */
#footer .widget ul li a {
    position: relative;
    padding-left: 22px;
    display: block;
    margin-bottom: 8px; /* tăng khoảng cách giữa các mục */
    font-size: 15px; /* dễ đọc hơn */
    line-height: 1.4;
    font-weight: normal; /* không in đậm các mục như About, Authors, Danh mục */
}

#footer .widget ul li a:before {
    content: "\f101";
    font-family: "FontAwesome";
    position: absolute;
    left: 0;
    top: 0;
    color: #ffffff;
    font-size: 14px;
    line-height: 1.4;
}

#footer .widget ul li a:hover:before {
    color: #eeeeee;
}

/* KHOẢNG CÁCH GIỮA CÁC MỤC GẦN NHAU HƠN */
#footer .widget ul li { /* đồng đều và thoáng hơn */
    transition: all 0.2s ease;  
}

#footer .widget ul li:hover {
    padding-left: 3px;
}

/* (đã loại bỏ các selector .footer-widget .comment-* vì không dùng) */

/* Force styles for default WP Recent Comments widget */
#footer .widget_recent_comments ul#recentcomments {
    list-style: none;
    margin: 0;
    padding: 0;
}

#footer .widget_recent_comments ul#recentcomments li.recentcomments {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

#footer .widget_recent_comments ul#recentcomments li.recentcomments:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

#footer .widget_recent_comments ul#recentcomments li.recentcomments img.avatar {
    width: 52px !important;
    height: 52px !important;
    border-radius: 50%;
}

#footer .widget_recent_comments ul#recentcomments li.recentcomments a {
    color: #ffffff !important;
    font-size: 14px;
}

#footer .widget_recent_comments ul#recentcomments li.recentcomments,
#footer .widget_recent_comments ul#recentcomments li.recentcomments span,
#footer .widget_recent_comments ul#recentcomments li.recentcomments time {
    color: #e1ece8;
    font-size: 12px;
}

/* Styles for Block-based Latest Comments widget */
#footer .wp-block-latest-comments {
    margin: 0;
    padding: 0;
}

#footer .wp-block-latest-comments li {
    list-style: none;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

#footer .wp-block-latest-comments li:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

#footer .wp-block-latest-comments .wp-block-latest-comments__comment-avatar,
#footer .wp-block-latest-comments img.avatar {
    width: 52px !important;
    height: 52px !important;
    border-radius: 50% !important;
    flex-shrink: 0;
}

#footer .wp-block-latest-comments a,
#footer .wp-block-latest-comments__comment-author,
#footer .wp-block-latest-comments__comment-link {
    color: #ffffff !important;
    font-size: 14px !important;
}

#footer .wp-block-latest-comments__comment-date,
#footer .wp-block-latest-comments time,
#footer .wp-block-latest-comments__comment-excerpt {
    color: #e1ece8 !important;
    font-size: 12px !important;
}

/* Remove bullets from all lists */
#footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#footer .footer-widget {
    margin-bottom: 25px;
}

/* (đã loại bỏ .social-links vì HTML dùng .social) */

/* Copyright section */
#footer .copyright {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding-top: 15px;
    margin-top: 15px;
    font-size: 12px;
    color: #cccccc;
    text-align: center;
    line-height: 1.4;
}

#footer .copyright a {
    color: #ffffff;
    text-decoration: underline;
}

#footer .copyright a:hover {
    text-decoration: none;
}

/* Đảm bảo khoảng cách giữa các cột gần nhau */
#footer .row {
    margin: 0 -10px;
}

#footer .col-md-3,
#footer .col-sm-6 {
    padding: 0 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    #footer {
        padding: 25px 0 15px;
    }
    
    #footer h5 {
        font-size: 15px;
        margin-bottom: 12px;
    }
    
    #footer .widget ul li a {
        font-size: 14px;
        padding-left: 20px;
        margin-bottom: 6px;
        font-weight: normal;
    }
    
    #footer .widget ul li a:before {
        font-size: 12px;
    }
    
    #footer .widget ul li {
        padding: 3px 0;
    }
    
    #footer .footer-widget {
        margin-bottom: 20px;
    }
    
}

@media (max-width: 767px) {
    #footer h5 {
        padding-left: 0;
        border-left: none;
        padding-bottom: 5px;
        margin-bottom: 8px;
    }
    
    #footer .copyright {
        text-align: left;
        padding-top: 12px;
        margin-top: 12px;
    }
}

@media (max-width: 480px) {
    #footer {
        padding: 20px 0 10px;
    }
    

    #footer .social-links a {
        margin-right: 10px;
        font-size: 20px;
    }
    
    #footer .copyright {
        font-size: 11px;
    }
    
    #footer .widget ul li a {
        padding-left: 20px;
    }
}
#footer .social a {
    display: inline-block;
    margin: 0 1px;
    font-size: 25px; /* chỉnh kích thước ở đây (24px -> 32px -> 40px tuỳ ý) */
    color: #ffffff;
    transition: all 0.3s ease;
}
</style>
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
					<h5>DANH MUC</h5>
						<div class="footer-widget">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<h5>BÌNH LUẬN</h5>
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


<?php wp_footer(); ?>

</body>

</html>