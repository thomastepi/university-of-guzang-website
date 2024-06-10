<?php
get_header();


while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(https://ik.imagekit.io/thormars/Uni-Guzang/uni-lib-2.jpg); background-position: center; background-repeat: no-repeat; background-size: cover">
        </div>
        <div class="page-banner__content container container--narrow">
            <php class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                    <p>Remember to replace</p>
                </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home"
                        aria-hidden="true"></i>Blog Home</a> <span class="metabox__main">Posted By
                    <?php the_author_posts_link(); ?> on <?php the_time('n-j-y') ?> in
                    <?php echo get_the_category_list(', ') ?></span>
            </p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php }


get_footer();
?>