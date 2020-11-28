<?php /* Section: Clients */ ?>

<section role="" id="clients" class="section section__clients clients">

	<div class="inner-wrap section__inner-wrap clients__inner-wrap">

		<!-- Header -->

		<h2 class="header section__header clients__header"><?php the_field( 's_clients_header' ); ?></h2>

		<!-- List of Clients -->

		<?php

			$featured_clients = get_field( 's_clients_featured_clients' );

		?>

		<?php if ( $featured_clients ) : ?>

			<ul class="featured-clients__list">

				<?php foreach ( $featured_clients as $post ) : ?>

					<?php

						// Options...

						$client_logo = get_field( 'client_logo' );

					?>

					<?php setup_postdata( $post ); ?>

					<li class="featured-client__item featured-client__item--<?php echo $post->post_name; ?>">

						<div class="featured-client__logo">

							<?php echo file_get_contents( $client_logo ); ?>

						</div>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</div>

</section>