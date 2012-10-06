<?php get_header(); ?>
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
<?php get_footer(); ?>
