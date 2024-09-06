<?php
$footer_class = 'footer';

if (is_front_page() || is_home() || is_front_page() && is_home()) {
    $footer_class .= ' is-home';
}
?>

<footer class="<?= $footer_class ?>">
    <!-- &copy; Luonnonystävät Ry -->
    Copyright &copy;
    <script>
        document.write(new Date().getFullYear())
    </script>
</footer>

<?php wp_footer(); ?>
</body>

</html>