<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>


    <?php locate_template('parts/section-hero.php', true); ?>


    <?php
    $content_builder = get_field('content_builder');
    foreach ( $content_builder as $item ) :
        switch ( $item['acf_fc_layout'] ) :
            case 'text_image':
                if ( !empty( $item['content'] ) ) :
                ?>
                <section class="section">
                    <div class="container">
                        <div class="textImage">
                            <div class="textImage__col1">
                                <div class="textImage__textContainer">
                                    <div class="wysiwyg"><?php echo $item['content']; ?></div>
                                </div>
                            </div>
                            <div class="textImage__col2">
                                <div class="textImage__imageContainer"><?php echo wp_get_attachment_image( $item['image']['ID'], 'full', false, ['class'=>'textImage__image'] ); ?></div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                endif;
                break;
            case 'image_text':
                ?>
                <section class="section">
                    <div class="container">
                        <div class="imageText">
                            <div class="imageText__col1">
                                <div class="imageText__textContainer">
                                    <div class="wysiwyg"><?php echo $item['content']; ?></div>
                                </div>
                            </div>
                            <div class="imageText__col2">
                                <div class="imageText__imageContainer"><?php echo wp_get_attachment_image( $item['image']['ID'], 'full', false, ['class'=>'imageText__image'] ); ?></div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                break;
            case 'text_video':
                if ( !empty( $item['content'] ) ) :
                    ?>
                    <section class="section">
                        <div class="container">
                            <div class="textImage">
                                <div class="textImage__col1">
                                    <div class="textImage__textContainer">
                                        <div class="wysiwyg"><?php echo $item['content']; ?></div>
                                    </div>
                                </div>
                                <div class="textImage__col2">
                                    <div class="textImage__imageContainer textImage__imageContainer--video">
                                        <a href="javascript:" data-fancybox data-src="<?php echo $item['video_url']; ?>" title="Watch video">
                                            <?php echo wp_get_attachment_image( $item['video_poster']['ID'], 'full', false, ['class'=>'textImage__image'] ); ?>
                                            <button type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="42px" height="50px" viewBox="0 0 42 50">
                                                    <path fill-rule="evenodd" fill="currentColor" d="M41.1000,24.1000 L0.000,49.250 L0.000,0.750 L41.1000,24.1000 Z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                endif;
                break;
            case 'video_text':
                ?>
                <section class="section">
                    <div class="container">
                        <div class="imageText">
                            <div class="imageText__col1">
                                <div class="imageText__textContainer">
                                    <div class="wysiwyg"><?php echo $item['content']; ?></div>
                                </div>
                            </div>
                            <div class="imageText__col2">
                                <div class="textImage__imageContainer textImage__imageContainer--video">
                                    <a href="javascript:" data-fancybox data-src="<?php echo $item['video_url']; ?>" title="Watch video">
                                        <?php echo wp_get_attachment_image( $item['video_poster']['ID'], 'full', false, ['class'=>'textImage__image'] ); ?>
                                        <button type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42px" height="50px" viewBox="0 0 42 50">
                                                <path fill-rule="evenodd" fill="currentColor" d="M41.1000,24.1000 L0.000,49.250 L0.000,0.750 L41.1000,24.1000 Z"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                break;
        endswitch;
    endforeach;
    ?>


    <nav class="section postNav">
        <div class="container">
            <?php if ( !empty( get_previous_post() ) ) : ?><a class="postNav__linkPrev" href="<?php echo get_the_permalink( get_previous_post() ); ?>" data-text-mobile="Prev"><span>Previous Post</span></a><?php endif; ?>
            <a class="postNav__linkBack" href="<?php echo selectrum_get_permalink( 2543 ); ?>"><span>Back<br> to news</span></a>
            <?php if ( !empty( get_next_post() ) ) : ?><a class="postNav__linkNext" href="<?php echo get_the_permalink( get_next_post() ); ?>" data-text-mobile="Next"><span>Next post</span></a><?php endif; ?>
        </div>
    </nav>


<?php endwhile; ?>

<?php get_footer(); ?>
