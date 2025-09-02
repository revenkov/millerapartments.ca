<?php
$content_cta = get_field('content_cta');
$button = get_field('button');
if ( !empty( $content_cta ) || !empty( $button ) ) :
?>
<footer class="section sectionCTA">
    <div class="container">
        <div class="sectionCTA__inner">
            <a class="blockCTA" href="<?php echo $button['url']; ?>" target="<?php echo !empty( $button['target'] ) ? '_blank' : '_self'; ?>">
                <?php echo $content_cta; ?>
                <?php if ( !empty( $button ) ) : ?>
                    <span class="btn"><?php echo $button['title']; ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</footer>
<?php endif; ?>