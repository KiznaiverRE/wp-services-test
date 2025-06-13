<?php
/**
 * @package Weight Loss Club
 */
?>

<?php
    $weight_loss_club_post_date = esc_html(get_the_date());
    
    $weight_loss_club_author_name = esc_html(get_the_author());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    
    <?php 
    $weight_loss_club_designation = get_post_meta($post->ID, 'weight_loss_club_designation', true);
    
    if ($weight_loss_club_designation) : ?>
        <p class="serv-content"><?php echo esc_html($weight_loss_club_designation); ?></p>
    <?php endif; ?>
    <div class="social-icon text-start">
        <?php
        $weight_loss_club_facebook_link = get_post_meta($post->ID, 'weight_loss_club_facebook_link', true);
        $weight_loss_club_twitter_link = get_post_meta($post->ID, 'weight_loss_club_twitter_link', true);
        $weight_loss_club_telegram_link = get_post_meta($post->ID, 'weight_loss_club_telegram_link', true);

        if ($weight_loss_club_facebook_link || $weight_loss_club_twitter_link || $weight_loss_club_telegram_link) :
        ?>
            <div class="meta-fields text-start">
                <?php if ($weight_loss_club_facebook_link) : ?>
                    <a href="<?php echo esc_url($weight_loss_club_facebook_link); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                <?php endif; ?>

                <?php if ($weight_loss_club_twitter_link) : ?>
                    <a href="<?php echo esc_url($weight_loss_club_twitter_link); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>

                <?php if ($weight_loss_club_telegram_link) : ?>
                    <a href="<?php echo esc_url($weight_loss_club_telegram_link); ?>" target="_blank"><i class="fab fa-telegram"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (has_post_thumbnail() ){ ?>
        <div class="post-thumb">
           <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>

    <?php if ('post' == get_post_type()) : ?>
        <div class="postmeta">
            <?php if (get_theme_mod('weight_loss_club_single_post_date', true)) : ?>
              <div class="post-date">
                  <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($weight_loss_club_post_date); ?>
              </div>
            <?php endif; ?>
            <?php if (get_theme_mod('weight_loss_club_single_post_comment', true)) : ?>
              <div class="post-comment">&nbsp; &nbsp;
                <span><?php echo esc_html(get_theme_mod('weight_loss_club_single_post_metabox_seperator', '|'));?></span>
                <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
              </div>
            <?php endif; ?>
            <?php if (get_theme_mod('weight_loss_club_single_post_author', true)) : ?>
                <div class="post-author">&nbsp; &nbsp;
                    <span><?php echo esc_html(get_theme_mod('weight_loss_club_single_post_metabox_seperator', '|'));?></span>
                    <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($weight_loss_club_author_name); ?>
                </div>
            <?php endif; ?>
            <?php if (get_theme_mod('weight_loss_club_single_post_time', true)) : ?>
                <div class="post-time">&nbsp; &nbsp;
                    <span><?php echo esc_html(get_theme_mod('weight_loss_club_single_post_metabox_seperator', '|'));?></span>
                    <i class="fas fa-clock"></i> &nbsp; <?php echo get_the_time(); ?>
                </div>
            <?php endif; ?>
        </div> 
    <?php endif; ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'weight-loss-club' ),
                'after'  => '</div>',
            ) );
        ?>
        <div class="tags"><?php the_tags(); ?></div>
    </div>
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'weight-loss-club' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>