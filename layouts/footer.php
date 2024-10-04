<footer>
    <p>&copy; <?php echo date('Y') ?> PHP CRUD Project. All rights reserved by <a href="https://mizanurdev.com/"
            target="_blank" class="text-danger text-decoration-none"> Md. Mizanur Rahman</a></p>
</footer>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script src="assets/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: '300px',
        forced_root_block: false,
        force_br_newlines: true,
        force_p_newlines: false,
        convert_newlines_to_brs: true,
    });
</script>
<script src="assets/js/main.js"></script>
</body>

</html>