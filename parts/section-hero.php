<?php
global $post;
$desktop = get_field('desktop', selectrum_get_hero_image_post_id());
$tablet = get_field('tablet', selectrum_get_hero_image_post_id());
$mobile = get_field('mobile', selectrum_get_hero_image_post_id());
?>
<header class="section heroSection">
    <div class="heroSection__mediaContainer">
        <picture>
            <?php if ( !empty( $mobile ) ) : ?><source media="(max-width: 767px)" srcset="<?php echo wp_get_attachment_image_srcset( $mobile['ID'] ); ?>"><?php endif; ?>
            <?php if ( !empty( $tablet ) ) : ?><source media="(max-width: 1259px)" srcset="<?php echo wp_get_attachment_image_srcset( $tablet['ID'] ); ?>"><?php endif; ?>
            <?php echo wp_get_attachment_image( $desktop['ID'], 'full', false, ['class'=>'heroSection__image']); ?>
        </picture>
    </div>
    <div class="heroSection__overlay">
        <div class="container">
            <div class="heroSection__textContainer wysiwyg"><?php echo selectrum_get_hero_text(); ?></div>
        </div>
    </div>
</header>