<div class="afooter">
	<div class="container">
		<div class="sidebar-box">
		        <!--widgets-->

	        	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		            <div class="sidebar-footer span2">
		                 <?php dynamic_sidebar( 'footer' ); ?>
		            </div>
	            <?php endif; ?>

		</div>
	</div>
</div>

<div class="afooter2">
	<div class="footer">


		<div class="mlogo">
			<div class="sidebar-user2 span2">
					   <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'shop_one_column' ) ); ?>"><?php printf( __( 'Powered by %s', 'shop_one_column' ), 'WordPress' ); ?></a>
					   <?php _e( 'Theme', 'shop_one_column' ); ?>   <a href="<?php echo esc_url( __( 'http://justpx.com/', 'shop_one_column' ) ); ?>"><?php printf( __( 'Shop One Column', 'shop_one_column' ), 'Shop One Column' ); ?></a>
			</div>
		</div>
	</div>
</div>
</div>

	<?php wp_footer(); ?>
</body>
</html>
