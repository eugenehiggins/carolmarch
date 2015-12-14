<div class="sidebar one-third columns omega">

	<?php if ( is_home() || is_front_page() ) {
		dynamic_sidebar('blog-sidebar');
	} else if ( is_page() ) {
		dynamic_sidebar('page-sidebar');
	} else {
		dynamic_sidebar('blog-sidebar');
	} ?>
</div> <!-- .sidebar -->