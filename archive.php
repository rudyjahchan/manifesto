<?php
	get_header();
?>

<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="archiveTitle">Category: <strong><?php single_cat_title(); ?></strong></h2>

<?php /* If this is a category archive */ } elseif (is_tag()) { ?>
<h2 class="archiveTitle">Tag: <strong><?php single_tag_title(); ?></strong></h2>

<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="archiveTitle">Month: <strong><?php the_time('F, Y'); ?></strong></h2>

<?php /* If this is a monthly archive */ } elseif (is_year()) { ?>
<h2 class="archiveTitle">Year: <strong><?php the_time('Y'); ?></strong></h2>

<?php /* If this is a monthly archive */ } elseif (is_date()) { ?>
<h2 class="archiveTitle">Date: <strong><?php the_date(); ?></strong></h2><?php } ?>


<?php

get_template_part( 'loop', 'archive' );

?>

<?php
	get_footer();
?>