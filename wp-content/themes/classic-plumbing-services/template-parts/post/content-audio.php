<?php
/**
 * @package Classic Plumbing Services
 */
?>

<?php
    $classic_plumbing_services_post_date = esc_html(get_the_date());
    $classic_plumbing_services_year = esc_html(get_the_date('Y'));
    $classic_plumbing_services_month = esc_html(get_the_date('m'));

    $classic_plumbing_services_author_id = esc_attr(get_the_author_meta('ID'));
    $classic_plumbing_services_author_link = esc_url(get_author_posts_url($classic_plumbing_services_author_id));
    $classic_plumbing_services_author_name = esc_html(get_the_author());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="listarticle">
      <?php
          if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
            if ( ! empty( $audio ) ) {
                foreach ( $audio as $audio_html ) {
                  echo '<div class="entry-audio">';
                  echo $audio_html;
                  echo '</div><!-- .entry-audio -->';
                }
            };
          };
          ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <div class="postmeta">
                    <?php if (get_theme_mod('classic_plumbing_services_metafields_date', true)) : ?>
                        <div class="post-date">
                            <a href="<?php echo esc_url(get_month_link($classic_plumbing_services_year, $classic_plumbing_services_month)); ?>">
                           <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($classic_plumbing_services_post_date); ?>
                                <span class="screen-reader-text"><?php echo esc_html($classic_plumbing_services_post_date); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>  
                    <?php if (get_theme_mod('classic_plumbing_services_metafields_comments', true)) : ?>  
                        <div class="post-comment">&nbsp; &nbsp;
                            <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <span><?php echo esc_html(get_theme_mod('classic_plumbing_services_metabox_seperator', '|'));?></span><i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                                <span class="screen-reader-text"><?php comments_number(); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('classic_plumbing_services_metafields_author', true)) : ?>
                        <div class="post-author">&nbsp; &nbsp;
                            <a href="<?php echo $classic_plumbing_services_author_link; ?>">
                            <span><?php echo esc_html(get_theme_mod('classic_plumbing_services_metabox_seperator', '|'));?></span><i class="fas fa-user"></i> &nbsp; <?php echo esc_html($classic_plumbing_services_author_name); ?>
                                <span class="screen-reader-text"><?php echo esc_html($classic_plumbing_services_author_name); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('classic_plumbing_services_metafields_time', true)) : ?>
                        <div class="post-time">&nbsp; &nbsp;
                            <a href="#">
                            <span><?php echo esc_html(get_theme_mod('classic_plumbing_services_metabox_seperator', '|'));?></span><i class="fas fa-clock"></i> &nbsp; <?php echo esc_html(get_the_time()); ?>
                                <span class="screen-reader-text"><?php echo esc_html(get_the_time()); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </header>
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php if(get_theme_mod('classic_plumbing_services_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $classic_plumbing_services_content = get_the_content(); ?>
                    <p><?php echo wpautop($classic_plumbing_services_content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('classic_plumbing_services_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $classic_plumbing_services_excerpt = get_the_excerpt(); echo esc_html($classic_plumbing_services_excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?>       
        </div>
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'classic-plumbing-services' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'classic-plumbing-services' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
        <?php endif; ?>
        <div class="clear"></div>    
    </div>
</article>

