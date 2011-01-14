<?php
	get_header();
?>

<h2>Search Results: "<?php the_search_query(); ?>" </h2>

<?php

get_template_part( 'loop', 'search' );

?>

<?php
	get_footer();
?>