<?php
/**
 * The header for our C9 Togo Theme
 *
 * Displays all of the <head> section and everything up till <div id="content"> and overrides the default header.php if its available.
 *
 * @package c9-togo
 */
?>
 			<div id="wrapper-navbar" class="header-navbar" itemscope itemtype="http://schema.org/WebSite">

				<nav class="navbar navbar-expand-lg navbar-light">

					<div class="container">
						<?php

							if (has_custom_logo()) {
								the_custom_logo();
							}
						?>
						<div class="navbar-small-buttons">
							<div class="nav-search">
								<a href="#" class="btn-nav-search">
									<i class="fa fa-search"></i>
									<span class="sr-only"><?php esc_html_e( 'Search', 'c9-togo' ); ?></span>
								</a>
							</div>
							<div class="nav-order d-inline-block d-lg-none">
								<?php
								if ( defined('WC_VERSION') ) { //show cart contents if woo is active
									$count = WC()->cart->get_cart_contents_count();

									//if there are items in the cart, put a number in front of the icon
									if ( $count != 0 ) {
										echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_attr__('Shopping Cart', 'c9-togo') . '" class="nav-link nav-shop-link"><span class="sr-only">' . esc_html__('View Cart', 'c9-togo') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></div>';
									} else { //if not just put in an icon
										echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_attr__('Shopping Cart', 'c9-togo') . '" class="nav-link nav-shop-link"><i class="fa fa-shopping-cart fa-md"></i> <span class="sr-only">' . esc_html__('View Cart', 'c9-togo') . '</span></a></div>';
									} //end count check
								} //end if woocommerce is active
								?>
							</div>
							<?php if (has_nav_menu('primary')) { ?>

							<div class="nav-toggle">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'c9-togo'); ?>">
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
									'container_class' => 'collapse navbar-collapse justify-content-center navbar-expand-lg pb-2 pt-2',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav nav nav-fill justify-content-between',
									'fallback_cb'     => '',
									'menu_id'         => 'main-menu',
									'depth'           => 2,
									'link_after'	  => '<span class="nav-highlight"></span>',
									'walker'          => new c9_WP_Bootstrap_Navwalker(),
								)
							);
							?>
					</div><!-- .container -->

				</nav><!-- .site-navigation -->
			</div><!-- .header-navbar-->
