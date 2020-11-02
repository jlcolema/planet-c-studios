<?php /* Section: Contact */ ?>

<section role="" id="contact" class="section section__contact contact">

	<div class="inner-wrap section__inner-wrap contact__inner-wrap">

		<!-- Header -->

		<h2 class="header section__header contact__header"><?php the_field( 's_contact_header' ); ?></h2>

		<!-- Form -->

		<div class="contact__form">

			<?php echo do_shortcode( '[contact-form-7 id="9" title="Contact"]' ); ?>

		</div>

		<!-- Contact Information -->

		<div class="contact__contact-information contact__h-card h-card">

			<div class="p-tel contact__tel"><?php the_field( 'contact_tel', 'option' ); ?></div>

			<div class="u-email contact__email">

				<a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>" class="u-email__link contact__link"><?php the_field( 'contact_email', 'option' ); ?></a>

			</div>

		</div>

		<!-- Locations -->

		<?php if ( have_rows( 'contact_locations_list', 'option' ) ) : ?>

			<div class="contact__locations">

				<ul class="locations__list">

					<?php while ( have_rows( 'contact_locations_list', 'option' ) ) : the_row(); ?>

						<?php

							/* Options */

							$contact_region = get_sub_field( 'contact_region' );

						?>

						<li class="location__item location__h-card h-card">

							<h3 class="p-name location__name"><?php the_sub_field( 'location_name' ); ?></h3>

							<?php if ( get_sub_field( 'location_organization' ) ) : ?>

								<div class="p-org location__org"><?php the_sub_field( 'location_organization' ); ?></div>

							<?php endif; ?>

							<div class="p-adr h-adr location__adr">

								<div class="p-street-address location__street-address"><?php the_sub_field( 'location_street_address' ); ?></div>

								<?php if ( get_sub_field( 'location_suite' ) ) : ?>

									<div class="p-extended-address location__extended-address">Suite <?php the_sub_field( 'location_suite' ); ?></div>
								
								<?php endif; ?>

								<?php if ( get_sub_field( 'location_office' ) ) : ?>

									<div class="p-extended-address location__extended-address">Office <?php the_sub_field( 'location_office' ); ?></div>

								<?php endif; ?>

								<div class="location__div">
								
									<span class="p-locality location__locality"><?php the_sub_field( 'location_locality' ); ?></span>, <span title="California" class="p-region location__region"><?php the_sub_field( 'location_region' ); ?></span> <span class="p-postal-code location__postal-code"><?php the_sub_field( 'location_postal_code' ); ?></span>

								</div>

							</div>

							<div class="p-tel location__tel">

								<span class="p-label location__label">(tel)</span> <?php the_sub_field( 'location_tel' ); ?>

							</div>

						</li>

					<?php endwhile; ?>

				</ul>

			</div>

		<?php endif; ?>

	</div>

</section>