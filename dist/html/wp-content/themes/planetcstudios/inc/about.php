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

						<div class="member__item member__item--founder">

							<div class="member__photo">

								<img src="https://via.placeholder.com/120x120.png?text=Photo+(120x120)" alt="A photo of Michael Carone" class="member__img" />

							</div>

							<h4 class="member__name">Michael Carone</h4>

							<h5 class="member__role">Founder/Director</h5>

							<div class="member__bio">

								<p>Carone was born in Milwaukee, Wisconsin and raised in Los Angeles, California. With a strong resume of practical production and post-production experience dating back to his teenage years, Carone was hired by Universal Studios immediately after graduating from the University of Southern California (USC) to work at Universal Creative in the media production group. In 2001, Carone founded Planet C Studios to further his career as a Director (DGA) and Producer. Carone recently directed and produced a half-hour comedy pilot, <a href="https://www.imdb.com/title/tt2887794/combined">Sensitive Men</a>, featuring Whoopi Goldberg, French Stewart and Metta World Peace, which is currently being considered for series at a premium cable network.</p>

							</div>

						</div>						

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

										?>

										<li class="member__item member__item--core-team">

											<div class="member__photo">
											
												<?php if ( ! $member_photo_small ) : ?>

													<img src="https://via.placeholder.com/60x60.png?text=Placeholder+Photo" srcset="https://via.placeholder.com/120x120.png?text=Placeholder+Photo 2x" alt="A placeholder photo for <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img member__img--is-placeholder" />

												<?php else : ?>

													<img src="<?php echo $member_photo_small[0]; ?>" srcset="<?php echo $member_photo_large[0]; ?> 2x" alt="A photo of <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img" />


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

								?>

								<li class="member__item member__item--key-collaborators">

									<div class="member__photo">
											
										<?php if ( ! $member_photo_small ) : ?>

											<img src="https://via.placeholder.com/60x60.png?text=Placeholder+Photo" srcset="https://via.placeholder.com/120x120.png?text=Placeholder+Photo 2x" alt="A placeholder photo for <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img member__img--is-placeholder" />

										<?php else : ?>

											<img src="<?php echo $member_photo_small[0]; ?>" srcset="<?php echo $member_photo_large[0]; ?> 2x" alt="A photo of <?php the_title(); ?>" width="60" height="60" decoding="async" loading="lazy" class="member__img" />


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

</section>