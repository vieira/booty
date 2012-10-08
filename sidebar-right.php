<div class="span3">
<?php 
	if ( dynamic_sidebar('right_sidebar') ) : 

	else : ?>
	<a href="#" class="btn btn-info">Default</a><br><br>

	<div class="well sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header">Categorias</li>
<?php
$args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  );

	$categories = get_categories($args);

foreach($categories as $category) {
    echo '<li class="active"><a href="">'.$category->name.'</a></li>';
    echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( $category->name ) . '" ' . '>' . $category->name.'</a> </li> ';
}
?>

	</ul></div>

	<div class="well sidebar-nav"><ul class="nav nav-list">
		<?php wp_list_bookmarks('title_li=&title_before=<li class="nav-header">&title_after=</li>&category_before=&category_after='); ?>
	</ul></div>

<?php endif; ?>

</div>
