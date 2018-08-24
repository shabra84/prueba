		<div class="site-branding">
			<?php dara_the_custom_logo(); ?>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<?php dara_social_menu(); ?>
          <!-- iconos cabecera -->
          <div id="iconos">
            <a style="color:#03a9f4;" href="http://www.pelambres.es"><i class="fas fa-home"></i></a>
            <a style="color:#03a9f4;" href="mailto:fernandomangasmolteni@gmail.com"><i class="fas fa-envelope"></i></a>
          </div>
		</div><!-- .site-branding -->
