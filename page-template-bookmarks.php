<?php
/**
 * Template Name: Bookmarks
 *
 * A custom page template for displaying the site's bookmarks/links.
 *
 * @package Oxygen
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>

	<?php do_atomic( 'before_content' ); // oxygen_before_content ?>
	
	<div class="content-wrap">	

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							<h2 class="post-title entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
							<div class="entry-content">
								
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oxygen' ) ); ?>
	
								<?php $args = array(
									'title_li' => false,
									'title_before' => '<h2>',
									'title_after' => '</h2>',
									'category_before' => false,
									'category_after' => false,
									'categorize' => true,
									'show_description' => true,
									'between' => '<br />',
									'show_images' => false,
									'show_rating' => false,
								); ?>
								<?php wp_list_bookmarks( $args ); ?>
	
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'oxygen' ), 'after' => '</p>' ) ); ?>
								
							</div><!-- .entry-content -->
	
							<div class="entry-meta"><?php edit_post_link(); ?></div>
	
							<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>
	
						<?php do_atomic( 'after_singular' ); // oxygen_after_singular ?>
	
					<?php endwhile; ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>