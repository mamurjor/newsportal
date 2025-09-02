    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="<?php echo home_url(); ?>" class="d-flex flex-column flex-wrap">
                            <p class="text-white mb-0 display-6"><?php bloginfo('name'); ?></p>
                            <small class="text-light" style="letter-spacing: 11px; line-height: 0;"><?php bloginfo('description'); ?></small>
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex position-relative rounded-pill overflow-hidden">
                            <input class="form-control border-0 w-100 py-3 rounded-pill" type="email" placeholder="example@gmail.com">
                            <button type="submit" class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute" style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-1">
                        <h4 class="mb-4 text-white">Get In Touch</h4>
                        <p class="text-secondary line-h">Address: <span class="text-white">123 Streat, New York</span></p>
                        <p class="text-secondary line-h">Email: <span class="text-white">example@gmail.com</span></p>
                        <p class="text-secondary line-h">Phone: <span class="text-white">+0123 4567 8910</span></p>
                        <div class="d-flex line-h">
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-twitter text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-facebook-f text-dark"></i></a>
                            <a class="btn btn-light me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-youtube text-dark"></i></a>
                            <a class="btn btn-light btn-md-square rounded-circle" href="#"><i class="fab fa-linkedin-in text-dark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-2">
                        <h4 class="mb-4 text-white">Recent Posts</h4>
                        <?php
                        // Latest 2 posts
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 2,
                            'post_status' => 'publish'
                        ));
                        foreach( $recent_posts as $post ) : ?>
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="rounded-circle border border-2 border-primary overflow-hidden" style="width: 60px; height: 60px;">
                                        <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail', array('class' => 'img-fluid rounded-circle w-100')); ?>
                                    </div>
                                    <div class="d-flex flex-column ps-4">
                                        <p class="text-uppercase text-white mb-2"><?php echo get_the_category($post['ID'])[0]->name ?? 'Uncategorized'; ?></p>
                                        <span class="h6 text-white"><?php echo $post['post_title']; ?></span>
                                        <small class="text-white d-block"><i class="fas fa-calendar-alt me-1"></i><?php echo get_the_date('', $post['ID']); ?></small>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="d-flex flex-column text-start footer-item-3">
                        <h4 class="mb-4 text-white">Categories</h4>
                        <?php
                        $categories = get_categories();
                        foreach( $categories as $cat ) {
                            echo '<a class="btn-link text-white" href="'.get_category_link($cat->term_id).'"><i class="fas fa-angle-right text-white me-2"></i>'.$cat->name.'</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="footer-item-4">
                        <h4 class="mb-4 text-white">Our Gallery</h4>
                        <div class="row g-2">
                            <?php
                            // Latest 6 posts with thumbnails as gallery
                            $gallery_posts = wp_get_recent_posts(array(
                                'numberposts' => 6,
                                'post_status' => 'publish'
                            ));
                            foreach( $gallery_posts as $g_post ) : ?>
                                <div class="col-4">
                                    <div class="rounded overflow-hidden">
                                        <a href="<?php echo get_permalink($g_post['ID']); ?>">
                                            <?php echo get_the_post_thumbnail($g_post['ID'], 'thumbnail', array('class' => 'img-fluid rounded w-100')); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><i class="fas fa-copyright text-light me-2"></i><?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All rights reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed By <a class="border-bottom" href="https://htmlcodex.com" target="_blank">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <?php wp_footer(); ?>
</body>
</html>
