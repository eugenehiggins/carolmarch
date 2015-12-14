		<footer class="footer">
			<div class="footer-row row">
		
				<div class="alpha one-third columns clearfix widget-hold">
					<?php dynamic_sidebar('footer-widgets-row-1'); ?>
				</div>
		
				<div class="one-third columns clearfix widget-hold">
					<?php dynamic_sidebar('footer-widgets-row-2'); ?>
				</div>
		
				<div class="omega one-third columns clearfix widget-hold">
					<?php dynamic_sidebar('footer-widgets-row-3'); ?>
				</div>
		
			</div>
			<div class="row footer-credits">
				<p><?php echo ci_footer(); ?></p>
			</div>
		</footer> <!-- .footer -->
	</div> <!-- .sixteen-columns -->
</div> <!-- .container -->

<?php wp_footer(); ?>

</body>
</html>