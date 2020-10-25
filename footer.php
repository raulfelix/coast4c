<?php
/*
 * The main footer template file.
 */
?>
	<footer class="footer">
		<div class="footer-wrapper">
			<div class="footer-logo-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/static/images/logo-horizontal-white.svg" alt="" />
			</div>
			<div class="footer-description">
				<p><?php echo get_option( 'blogdescription' ) ?></p>
			</div>
			<div class="footer-content">
				<div class="footer-block">
					<?php
						echo wp_nav_menu('footer-1');
					?>
				</div>
				<div class="footer-block">
					<div class="footer-info">
						<p>EMAIL</p>
						<div>info@coast4c.com</div>
					</div>
					<div class="footer-info">
						<p>POST</p>
						<div>info@coast4c.com</div>
					</div>
					<div class="footer-info">
						<div>ABN 92 641 553 82</div>
					</div>
				</div>
			</div>
			<?php get_template_part('partials/footer', 'legals'); ?>
		</div>
	</footer>
	<?php wp_footer(); ?>

	<script type="text/javascript">
		let body = document.body;

		function handleScroll() {
			if (window.pageYOffset > 90) {
				body.classList.add('has-scrolled');
			} else {
				body.classList.remove('has-scrolled');
			}
		}

		window.addEventListener('scroll', handleScroll, { passive: true });
	</script>
</body>
</html>