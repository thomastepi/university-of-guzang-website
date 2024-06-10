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

        <?php
        $theParentId = wp_get_post_parent_id(get_the_ID());
        if ($theParentId) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParentId); ?>"><i class="fa fa-home"
                            aria-hidden="true"></i> Back to <?php echo get_the_title($theParentId); ?></a> <span
                        class="metabox__main"><?php the_title();
                        ?></span>
                </p>
            </div>
        <?php }
        ;
        ?>

        <?php
        $flag = get_pages(
            array(
                'child_of' => get_the_ID(),
            )
        );

        if ($theParentId or $flag) { ?>
            <div class="page-links">
                <h2 class="page-links__title"><a
                        href="<?php echo get_permalink($theParentId); ?>"><?php echo get_the_title($theParentId); ?></a></h2>
                <ul class="min-list">
                    <?php
                    $childrenOfParent = !$theParentId ? get_the_ID() : $theParentId;
                    wp_list_pages(
                        array(
                            'title_li' => NULL,
                            'child_of' => $childrenOfParent
                        )
                    );
                    ?>
                </ul>
            </div>
        <?php } ?>


        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

    <hr>
<?php }


get_footer();
?>