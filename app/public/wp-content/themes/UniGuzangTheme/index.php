<?php
get_header();
?>
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(https://ik.imagekit.io/thormars/Uni-Guzang/uni-lib-2.jpg); background-position: center; background-repeat: no-repeat; background-size: cover">
    </div>
    <div class="page-banner__content container container--narrow">
        <php class="page-banner__title">Welcome to our blog!</h1>
            <div class="page-banner__intro">
                <p>Keep up with our latest news</p>
            </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php while (have_posts()) {
        the_post(); ?>
        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title"><a
                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="metabox">
                <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('n-j-y') ?> in
                    <?php echo get_the_category_list(', ') ?></p>
            </div>
            <div class="generic-content">
                <?php the_excerpt() ?>
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue Reading ></a></p>
            </div>
        </div>
    <?php }
    echo paginate_links();
    ?>

</div>

<?php
get_footer();

