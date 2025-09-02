<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();
?>
<?php get_header(); ?>

    <section class="section heroSection">
        <div class="container">
            <h1>Nothing Found</h1>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <p style="text-align: center;">It seems we can't find what you're looking for. Perhaps searching can help.</p>
        </div>
    </section>

<?php get_footer(); ?>