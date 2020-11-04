<?php /* Section: About */ ?>

<section role="" id="about" class="section section__about about">

	<div class="inner-wrap section__inner-wrap about__inner-wrap">

		<!-- Header -->

		<h2 class="header section__header about__header">About</h2>

		<!-- Overview -->

		<div class="about__overview">

			<!-- Mission Statement -->

			<div class="about__mission-statement">

				<?php the_field( 'about_mission_statement', 'option' ); ?>

			</div>

			<!-- Founded -->

			<div class="about__founded">
			
				Creative since <span class=""><?php the_field( 'about_founded', 'option' ); ?></span>

			</div>

		</div>

		<!-- Members -->

		<div class="about__members">

			<div class="member__type member__type--core-team">

				<h3 class="member__subheader member__subheader--core-team">Core Team</h3>

				<?php /* List of Core Team members. */ ?>

				<div class="core-team__containers">

					<div class="core-team__container core-team__founder">

						<?php

							$about_founder = get_field( 's_about_founder' );

						?>

						<?php if ( $about_founder ) : ?>

							<?php

								// Photo

								$member_photo_attachment_id = get_field( 'member_photo', $about_founder->ID );

								// Size Labels

								$member_photo_size_x_large = 'photo-x-large';
								$member_photo_size_large = 'photo-large';
								$member_photo_size_small = 'photo-small';

								// Image Sizes

								$member_photo_x_large = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_x_large );
								$member_photo_large = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_large );
								$member_photo_small = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_small );

								// Role

								$member_role = get_field( 'member_role', $about_founder->ID );

								// Bio

								$member_bio = get_field( 'member_bio', $about_founder->ID );

							?>

							<div class="member__item member__item--founder">

								<div class="member__photo">

									<img src="<?php echo $member_photo_large[0]; ?>" srcset="<?php echo $member_photo_x_large[0]; ?> 2x" alt="A photo of <?php echo esc_html( $about_founder->post_title ); ?>" width="120" height="120" decoding="async" loading="lazy" class="member__img" />

								</div>

								<h4 class="member__name"><?php echo get_the_title( $about_founder->ID ) ?></h4>

								<h5 class="member__role"><?php echo $member_role; ?></h5>

								<div class="member__bio">

									<?php echo $member_bio; ?>

								</div>

							</div>						

						<?php endif; ?>

					</div>

					<div class="core-team__container core-team__core-team">

						<div class="members__scroll members__scroll--core-team">

							<?php

								$core_team = get_field( 's_about_core_team' );

							?>

							<?php if ( $core_team ) : ?>

								<ul class="members__list members__list--core-team">

									<?php foreach ( $core_team as $post ) : ?>

										<?php setup_postdata( $post ); ?>

										<?php

											// Photo

											$member_photo_attachment_id = get_field( 'member_photo', $post->ID );

											// Size Labels

											$member_photo_size_large = 'photo-large';
											$member_photo_size_small = 'photo-small';

											// Image Sizes

											$member_photo_large = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_large );
											$member_photo_small = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_small );

											// Title

											$member_photo = get_field( 'member_photo' );

										?>

										<li class="member__item member__item--core-team">

											<div class="member__photo">
											
												<?php if ( $member_photo ) : ?>

													<img src="<?php echo $member_photo_small[0]; ?>" srcset="<?php echo $member_photo_large[0]; ?> 2x" alt="A photo of <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img" />

												<?php else : ?>

													<img src="https://via.placeholder.com/60x60.png?text=Placeholder+Photo" srcset="https://via.placeholder.com/120x120.png?text=Placeholder+Photo 2x" alt="A placeholder photo for <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img member__img--is-placeholder" />

												<?php endif; ?>

											</div>

											<h4 class="member__name"><?php the_title(); ?></h4>

											<h5 class="member__role"><?php the_field( 'member_role' ); ?></h5>

											<div class="member__bio">

												<?php the_field( 'member_bio' ); ?>

											</div>

										</li>

									<?php endforeach; ?>

								</ul>

								<?php wp_reset_postdata(); ?>

							<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

			<div class="member__type member__type--key-collaborators">

				<h3 class="member__subheader member__subheader--key-collaborators">Key Collaborators</h3>

				<?php /* List of Key Collaborators */ ?>

				<div class="members__scroll members__scroll--key-collaborators">

					<?php

						$key_collaborators = get_field( 's_about_key_collaborators' );

					?>

					<?php if ( $key_collaborators ) : ?>

						<ul class="members__list members__list--key-collaborators">

							<?php foreach ( $key_collaborators as $post ) : ?>

								<?php setup_postdata( $post ); ?>

								<?php

									// Photo

									$member_photo_attachment_id = get_field( 'member_photo', $post->ID );

									// Size Labels

									$member_photo_size_large = 'photo-large';
									$member_photo_size_small = 'photo-small';

									// Image Sizes

									$member_photo_large = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_large );
									$member_photo_small = wp_get_attachment_image_src( $member_photo_attachment_id, $member_photo_size_small );

									// Title

									$member_photo = get_field( 'member_photo' );

								?>

								<li class="member__item member__item--key-collaborators">

									<div class="member__photo">
											
										<?php if ( $member_photo ) : ?>

											<img src="<?php echo $member_photo_small[0]; ?>" srcset="<?php echo $member_photo_large[0]; ?> 2x" alt="A photo of <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img" />

										<?php else : ?>

											<img src="https://via.placeholder.com/60x60.png?text=Placeholder+Photo" srcset="https://via.placeholder.com/120x120.png?text=Placeholder+Photo 2x" alt="A placeholder photo for <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img member__img--is-placeholder" />

										<?php endif; ?>

									</div>

									<h4 class="member__name"><?php the_title(); ?></h4>

									<h5 class="member__role"><?php the_field( 'member_role' ); ?></h5>

									<?php /*

										<div class="member__bio">

											<?php the_field( 'member_bio' ); ?>

										</div>

									*/ ?>

								</li>

							<?php endforeach; ?>

						</ul>

						<?php wp_reset_postdata(); ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</section>