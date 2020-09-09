<?php
/**
 * The header for our client theme.
 *
 * Displays all of the <head> section and everything up till <div id="content"> and overrides the default header.php if its available.
 *
 * @package C9
 */
?>
 			<div id="wrapper-navbar" class="header-navbar" itemscope itemtype="http://schema.org/WebSite">

				<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'c9-togo' ); ?></a>

				<nav class="navbar navbar-expand-lg navbar-light">

					<div class="container">
						<?php

							// Use customizer logo, if that's not set, show text of site title
							$c9_site_name = get_bloginfo( 'name' );

							if (has_custom_logo()) {
								the_custom_logo();
							}
						?>

						<div class="navbar-small-buttons">
							<div class="nav-search">
								<a href="#" class="btn-nav-search">
									<i class="fa fa-search"></i>
									<span class="sr-only"><?php __( 'Search', 'c9-togo' ); ?></span>
								</a>
							</div>
							<div class="nav-order d-inline-block d-lg-none">
								<?php
								if ( defined('WC_VERSION') ) { //show cart contents if woo is active
									$count = WC()->cart->get_cart_contents_count();

									//if there are items in the cart, put a number in front of the icon
									if ( $count != 0 ) {
										echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . wc_get_cart_url() . '" title="Shopping Cart" class="nav-link"><span class="sr-only">' . __('View Cart', 'c9-togo') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></div>';
									} else { //if not just put in an icon
										echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . wc_get_cart_url() . '" title="Shopping Cart" class="nav-link"><i class="fa fa-shopping-cart fa-md"></i> <span class="sr-only">' . __('View Cart', 'c9-togo') . '</span></a></div>';
									} //end count check
								} //end if woocommerce is active
								?>
							</div>
							<?php if (has_nav_menu('primary')) { ?>

							<div class="nav-toggle">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
									<i class="fa fa-bars"></i>
								</button>
							</div>
							<!--.nav-toggle-->
							<?php
							}
							?>
						</div><!-- .navbar-small-buttons-->

						<!-- The WordPress Menu goes here -->
						<?php
						wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'collapse navbar-collapse justify-content-center navbar-expand-lg',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav nav nav-fill justify-content-between',
									'fallback_cb'     => '',
									'menu_id'         => 'main-menu',
									'depth'           => 2,
									'link_after'	  => '<span></span>',
									'walker'          => new c9_WP_Bootstrap_Navwalker(),
								)
							);
							?>
					</div><!-- .container -->

				</nav><!-- .site-navigation -->
			</div><!-- .header-navbar-->
