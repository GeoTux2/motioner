<?php get_header(); ?>

<div class="content">
	<div class="content-inner group">
		<?php while ( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
				<div class="post-wrapper">
					
					<?php do_action( 'alx_ext_sharrre' ); ?>
					
					<header class="entry-header group">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta">
							<span class="entry-category">
								<?php esc_html_e('By','motioner'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php the_author_meta('display_name'); ?>
								</a>
							</span> &middot;
							<span class="entry-date"><?php the_time( get_option('date_format') ); ?></span> &middot;
							<span class="entry-category">
                                                                <span class="dashicons dashicons-open-folder"></span>
                                                                <?php the_category(' / '); ?>
                                                        </span> &middot;
                                                        <span class="entry-category"><?php echo do_shortcode( '[post-views]' ); ?></span>
						</div>
					</header>

					<div class="entry-media">
						<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
					</div>
					
					<div class="entry-content">
						<div class="entry themeform">	
							<?php the_content(); ?>
							<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','motioner'),'after'=>'</div>')); ?>
							<div class="clear"></div>				
						</div><!--/.entry-->
					</div>

					<div class="entry-footer group">
						
						<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','motioner').'</span> ','','</p>'); ?>
						
						<div class="clear"></div>
						
						<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
							<div class="author-bio">
								<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
								<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
								<p class="bio-desc"><?php the_author_meta('description'); ?></p>
								<div class="clear"></div>
							</div>
						<?php endif; ?>
						
						<?php do_action( 'alx_ext_sharrre_footer' ); ?>
						
						<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>
						
						<?php if ( get_theme_mod( 'post-nav', 'sidebar' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>

						<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
						
					</div>

				</div>
			</article><!--/.post-->
		<?php endwhile; ?>
	</div>
</div><!--/.content-->

<div id="move-sidebar-content"></div>

<?php get_footer(); ?>
