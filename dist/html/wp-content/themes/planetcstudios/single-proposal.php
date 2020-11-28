<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Planet_C_Studios
 * @since Planet C Studios 1.0
 */

?>

<?php get_header(); ?>

	<?php if ( post_password_required() ) : ?>

		<?php

			function proposal_password_form() {
	
				global $post;
	
				$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	
				$proposal_password_form = '
				
					<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="proposal__form">

						<fieldset>

							<legend>' . __( "To view this proposal, enter the password below:" ) . '</legend>
	
							<ol class="">

								<li class="">

									<label for="' . $label . '" class="">' . __( "Password" ) . '</label>
					
									<input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" placeholder="Password" class="" />
					
								</li>

							</ol>

							<div class="">

								<input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" class="" />
	
							</div>

						</fieldset>

					</form>
				
				';
	
				return $proposal_password_form;

			}

			add_filter( 'the_password_form', 'proposal_password_form' );

		?>
		
		<?php echo proposal_password_form(); ?>

	<?php else : ?>

		<?php

			// Cover

			$proposal_cover_attachment_id = get_field( 'proposal_cover' );

			// Size Labels

			$proposal_cover_size_large = 'cover-large';
			$proposal_cover_size_small = 'cover-small';

			// Image Sizes

			$proposal_cover_large = wp_get_attachment_image_src( $proposal_cover_attachment_id, $proposal_cover_size_large );
			$proposal_cover_small = wp_get_attachment_image_src( $proposal_cover_attachment_id, $proposal_cover_size_small );

			// Clients

			$proposal_clients = get_field( 'proposal_client' );

			// Title

			$proposal_cover = get_field( 'proposal_cover' );

		?>

		<div class="proposal">

			<div class="proposal__inner-wrap">

				<div class="proposal__overview">

					<div class="proposal__overview-inner-wrap">

						<h1 class="proposal__s-title"><?php the_title(); ?></h1>

						<div class="proposal__meta">

							<!-- 
								
								Two sizes are available:
									
								1. cover-large, 380 x 560, for higher density screens.
								2. cover-small, 190 x 288, the default output.

							-->

							<div class="proposal__s-cover">

								<?php if ( $proposal_cover ) : ?>

									<img src="<?php echo $proposal_cover_small[0]; ?>" srcset="<?php echo $proposal_cover_large[0]; ?> 2x" alt="The cover image for <?php echo $proposal_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="proposal__s-img" />

								<?php else : ?>

									<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php echo $proposal_title; ?>" width="190" height="280" decoding="async" loading="lazy" class="proposal__s-img proposal__s-img--is-placeholder" />

								<?php endif; ?>

							</div>

							<div class="proposal__details">

								<?php if ( get_field( 'proposal_description' ) ) : ?>

									<div class="proposal__description">

										<?php the_field( 'proposal_description' ); ?>

									</div>

								<?php endif; ?>

								<div class="proposal__extra">

									<?php if ( get_field( 'proposal_date' ) ) : ?>

										<div class="proposal__date"><?php the_field( 'proposal_date' ); ?></div>

									<?php endif; ?>

									<?php if ( get_field( 'proposal_location' ) ) : ?>

										<div class="proposal__location"><?php the_field( 'proposal_location' ); ?></div>

									<?php endif; ?>

									<?php if ( $proposal_clients ) : ?>

										<div class="proposal__client">

											<span class="client__label">Client:</span>
											
											<ul class="client__list">

												<?php foreach ( $proposal_clients as $proposal_client ) : ?>
												
													<?php

														// Title

														$client_title = get_the_title( $proposal_client->ID );

													?>

													<li class="client__item"><?php echo esc_html( $client_title ); ?></li>

												<?php endforeach; ?>

											</ul>

										</div>

									<?php endif; ?>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="proposal__projects">

					<div class="proposal__projects-inner-wrap">

						<!-- Featured Projects -->

						<?php

							$proposal_projects = get_field( 'proposal_projects' );

						?>

						<?php if ( $proposal_projects ) : ?>

							<ul class="proposal-projects__list">

								<?php foreach ( $proposal_projects as $post ) : ?>

									<?php setup_postdata( $post ); ?>

									<?php

										// Cover

										$project_cover_attachment_id = get_field( 'project_cover' );

										// Size Labels

										$project_cover_size_large = 'cover-large';
										$project_cover_size_small = 'cover-small';

										// Image Sizes

										$project_cover_large = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_large );
										$project_cover_small = wp_get_attachment_image_src( $project_cover_attachment_id, $project_cover_size_small );

										$project_cover = get_field( 'project_cover' );

									?>

									<li class="proposal-project__item">

										<a href="<?php the_permalink(); ?>" class="proposal-project__link">

											<!-- 
												
												Two sizes are available:
													
												1. cover-large, 380 x 560, for higher density screens.
												2. cover-small, 190 x 288, the default output.

											-->

											<div class="proposal-project__cover">

												<?php if ( $project_cover ) : ?>

													<img src="<?php echo $project_cover_small[0]; ?>" srcset="<?php echo $project_cover_large[0]; ?> 2x" alt="The cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="proposal-project__img" />

												<?php else : ?>

													<img src="https://via.placeholder.com/190x280.png?text=Placeholder+Cover" srcset="https://via.placeholder.com/380x560.png?text=Placeholder-Cover 2x" alt="The placeholder cover image for <?php the_title(); ?>" width="190" height="280" decoding="async" loading="lazy" class="proposal-project__img proposal-project__img--is-placeholder" />

												<?php endif; ?>
							
											</div>

											<h3 class="proposal-project__title"><?php the_title(); ?></h3>

										</a>

									</li>

								<?php endforeach; ?>

							</ul>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

<?php get_footer(); ?>