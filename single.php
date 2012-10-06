<?php get_header(); ?>
<section>
<?php while (have_posts()) : the_post(); ?>
<article>
<header class="page-header">
  <h1><?php the_title(); ?> <small><?php the_time('F jS, Y') ?></small></h1>
</header>
<div><?php the_content(); ?></div>
<hr />
<section id="comments">
<h3>Comments</h3>
<?php foreach (get_comments('post_id=' . get_the_ID()) as $comment): ?>
<blockquote>
<p><?=$comment->comment_content?></p>
<small>
<cite title="<?=$comment->comment_author?>">
<?=$comment->comment_author?>
</cite>
at <?=$comment->comment_date?>
</small>
</blockquote>
<?php endforeach; ?>
<?php include('comments.php'); ?>
</section>
</article>
<?php endwhile; ?>
</section>
<?php get_footer(); ?>
