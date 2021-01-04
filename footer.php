<?php
/*
 * The main footer template file.
 */
?>
	<footer class="footer">
		<div class="footer-wrapper">
			<div>
				<div class="footer-logo-wrap">
					<img src="<?php echo get_template_directory_uri(); ?>/static/images/logo_stacked.svg" alt="" />
				</div>
				<div class="footer-description">
					<p><?php echo get_option( 'blogdescription' ) ?></p>
					<div class="footer-legals">
						<span>&copy;2020 by COAST 4C Limited - ABN 92 641 553 82</span>
					</div>
				</div>
			</div>
			<div class="footer-content">
				<div class="footer-block">
					<h3 class="footer-block-title">Company</h3>
					<?php
					  echo wp_nav_menu(array( 'menu' => 'footer-1' ) );
					?>
				</div>
				<div class="footer-block">
					<h3 class="footer-block-title">Learn</h3>
					<?php
					  echo wp_nav_menu(array( 'menu' => 'footer-learn' ) );
					?>
				</div>
				<div class="footer-block">
					<h3 class="footer-block-title">Contact</h3>
					<div class="footer-info">
						<p>EMAIL</p>
						<div>info@coast4c.com</div>
					</div>
					<div class="footer-info">
						<p>POST</p>
						<div>Cronulla, NSW 2230, Australia</div>
					</div>
				</div>
				<div class="footer-block footer-social">
					<h3 class="footer-block-title">Follow us</h3>
					<div>
						<a href="https://www.facebook.com/coast4c" target="_blank" class="icon-facebook"></a>
						<a href="https://www.instagram.com/coast4c/" target="_blank" class="icon-instagram"></a>
						<a href="https://twitter.com/coast4c" target="_blank" class="icon-twitter"></a>
					</div>
				</div>
			</div>
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