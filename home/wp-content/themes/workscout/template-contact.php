<?php
/**
 * Template Name: Contact Page
 *
 * A page showing map below title.
 *
 *
 * @package WordPress
 * @subpackage workscout
 * @since workscout 1.0
 */


get_header(); ?>

<?php $header_image = get_post_meta($post->ID, 'pp_job_header_bg', TRUE); 
if(!empty($header_image)) { ?>
    <div id="titlebar" class="photo-bg single" style="background: url('<?php echo esc_url($header_image); ?>')">
<?php } else { ?>
    <div id="titlebar" class="single">
<?php } ?>
    <div class="container">

        <div class="sixteen columns">
            <h1><?php the_title(); ?></h1>
            <?php if(function_exists('bcn_display')) { ?>
                <nav id="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                    <ul>
                        <?php bcn_display_list(); ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
<!-- Content
================================================== -->
<!-- Container -->
<div class="container">
    <div class="sixteen columns">

       

    </div>
</div>
<!-- Container / End -->

<div class="container <?php echo esc_attr($layout); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
        <div class="padding-right">
        

            <footer class="entry-footer">
                <?php edit_post_link( esc_html__( 'Edit', 'workscout' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-footer -->
    
            <?php
                if(ot_get_option('pp_pagecomments','on') == 'on') {
                    
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                }
            ?>
            </div>
    </article>

    <?php if($layout !="full-width") { get_sidebar(); }?>

</div>
<?php endwhile; // End the loop. Whew.

get_footer();

?>