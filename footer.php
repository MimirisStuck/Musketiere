

</main>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<footer class="footer">
    <div class="footer-main">
        <div class="footer-main-contact">
            <h4>Kontakt</h4>
            <p class="footer-main-contact-name"><?php echo get_theme_mod('footer_name'); ?></p>
            <p>Geschäfftsstelle:</p>
            <p><?php echo get_theme_mod('footer_address'); ?></p>
            <p><?php echo get_theme_mod('footer_city'); ?></p>
            <p>Tel. <a href="<?php echo get_theme_mod('footer_phone'); ?>"><?php echo get_theme_mod('footer_phone'); ?></a></p>
            <p>E-Mail: <a href="mailto:<?php echo get_theme_mod('footer_email'); ?>"><?php echo get_theme_mod('footer_email'); ?></a></p>
        </div>
        <div class="footer-main-links">
            <h4>Rechtliches & Infos</h4>
            <a href="<?php echo get_theme_mod('footer_link_1'); ?>">Impressum</a><br>
            <a href="<?php echo get_theme_mod('footer_link_2'); ?>">Datenschutzerklärung</a><br>
            <a href="<?php echo get_theme_mod('footer_link_3'); ?>">Barrierefreiheitserklärung</a><br>
            <a href="<?php echo get_theme_mod('footer_link_4'); ?>">Kontakt</a><br>
            <a href="<?php echo get_theme_mod('footer_link_5'); ?>">Jugendschutz</a><br>
        </div>
    </div>
    <div class="footer-social">
        <a class="footer-social-twitter" href="x.com"><i class="fab fa-x-twitter"></i></a>
        <a class="footer-social-facebook" href="facebook.com"><i class="fab fa-facebook-f"></i></a>
        <a class="footer-social-instagram" href="instagram.com"><i class="fab fa-instagram"></i></a>

    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>