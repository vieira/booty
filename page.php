<?php get_header(); ?>
<div class="row-fluid">
<?php //definição da largura do corpo em função da existencia de sidebars e inclui o sidebar esquerdo se activo

$side = get_theme_mod( 'sidebar_setting', 'default_value' );

if($side == 1 ){
        include('sidebar-left.php');
        echo '<div class="span9">';
}
elseif($side == 2 ){
        echo '<div class="span9">';
}
elseif($side == 3){
        include('sidebar-left.php');
        echo '<div class="span6">';
}
else{
        echo '<div class="span12">';
}
?>

<section>
<?php while (have_posts()) : the_post(); ?>
<article>
<header class="page-header">
  <h1><?php the_title(); ?></h1>
</header>
<div><?php the_content(); ?></div>
</article>
<?php endwhile; ?>
</section>
</div>
<?php   //adds Sidebar direito se activo
        //$side = get_theme_mod( 'sidebar_setting', 'default_value' );

        if($side == 1 ){
        }
        elseif($side == 2 ){
                include('sidebar-right.php');
        }
        elseif($side == 3){
                include('sidebar-right.php');
        }
?>
</div>
<?php get_footer(); ?>
