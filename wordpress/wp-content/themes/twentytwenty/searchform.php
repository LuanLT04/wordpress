<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id( 'search-form-' );

$twentytwenty_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
// Backward compatibility, in case a child theme template uses a `label` argument.
if ( empty( $twentytwenty_aria_label ) && ! empty( $args['label'] ) ) {
	$twentytwenty_aria_label = 'aria-label="' . esc_attr( $args['label'] ) . '"';
}

// Kiểm tra xem có phải đang ở trang kết quả tìm kiếm không
$is_search_page = is_search();

// Thử phát hiện lời gọi từ header bằng cách xem call stack
$called_from_header = false;
if ( function_exists( 'debug_backtrace' ) ) {
    $bt = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS );
    foreach ( $bt as $frame ) {
        if ( ! empty( $frame['file'] ) ) {
            $file_lower = strtolower( $frame['file'] );
            if (
                strpos( $file_lower, '/header.php' ) !== false ||
                strpos( $file_lower, '\\header.php' ) !== false ||
                strpos( $file_lower, 'template-parts' . DIRECTORY_SEPARATOR . 'modal-search' ) !== false ||
                strpos( $file_lower, 'template-parts/modal-search' ) !== false
            ) {
                $called_from_header = true;
                break;
            }
        }
    }
}
?>
<?php if ( $is_search_page && ! $called_from_header ) : ?>
<!-- Form tìm kiếm cho trang kết quả tìm kiếm -->
<div class="search-result-box">
    <form role="search" <?php echo $twentytwenty_aria_label; ?> method="get" class="search-result-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <i class="fa fa-search"></i>
        <input type="text" placeholder="Search topics or keywords" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit">Search</button>
    </form>
</div>
<style>
	/* Thanh tìm kiếm cho trang kết quả tìm kiếm */
.search-result-box {
    background-color: #f8f5eb;

    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

.search-result-form {
    display: flex;
    align-items: center;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 8px 12px;
    box-shadow: 0 0 4px rgba(255, 255, 255, 0.05);
}

.search-result-form i {	
    color: #333;
    font-size: 18px;
    margin-right: 10px;
}

.search-result-form input[type="text"] {
    flex: 1;
    border: none;
    outline: none;
    font-size: 16px;
    color: #555;
}

.search-result-form button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 4px;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-result-form button:hover {
    background-color: #218838;
}
</style>
<?php else : ?>
<form role="search" <?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $twentytwenty_unique_id ); ?>">
		<span class="screen-reader-text">
			<?php
			/* translators: Hidden accessibility text. */
			_e( 'Search for:', 'twentytwenty' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations
			?>
		</span>
		<input type="search" id="<?php echo esc_attr( $twentytwenty_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentytwenty' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwenty' ); ?>" />
</form>
<?php endif; ?>