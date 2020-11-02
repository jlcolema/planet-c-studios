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

											$member_photo_attachment_id = get_field( 'member_photo', $project->ID );

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

					<ul class="members__list members__list--key-collaborators">

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Tom Clancy" class="member__img" />
							
							</div>

							<h4 class="member__name">Tom Clancy</h4>

							<h5 class="member__role">Director of Photography</h5>

							<div class="member__bio">

								<p>Tom Clancey has been the Director of Photography for various projects with Planet C Studios including for the pilot episode of the original television comedy "Sensitive Men" featuring Whoopi Goldberg, Metta World Peace, and French Stewart and for Special Venue live action shoots for Universal Studios Hollywood, such as the Studio Backlot Tour, Transformers, Despicable Me, and Halloween Horror Nights.</p>
								
								<p>In addition, Clancey has an extensive list of feature film, television, commercial, special venue, documentary, and music video credits. Clancey's full credits and examples of his work can be found here: <a href="https://tomclancey.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Christopher Biggs" class="member__img" />
							
							</div>

							<h4 class="member__name">Christopher Biggs</h4>

							<h5 class="member__role">SFX Supervisor/Digital Artist</h5>

							<div class="member__bio">

								<p>Christopher Biggs is a cross platform "Digital Ronin" with an emphasis in video production for theme parks. Most recently he's been working with Universal Studios Tours. His credits include multiple video projections for Imagineering at Tokyo Disneyland & Disney Seas, Euro Disney Paris, Disney World Florida, and Disneyland, Anaheim - including such favorite attractions as "The Pirates of the Caribbean", "The Haunted Mansion", "The Little Mermaid", and "Space Mountain."</p>
								
								<p>Chris and Planet C collaborate often on projection mapping projects including may effects seen in Warner Bros. Horror Made Here attractions.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

						<li class="member__item member__item--key-collaborators">

							<div class="member__photo">
							
								<img src="https://via.placeholder.com/60x60.png?text=Photo+(60x60)" alt="A photo of Casey Dodd" class="member__img" />
							
							</div>

							<h4 class="member__name">Casey Dodd</h4>

							<h5 class="member__role">Artist</h5>

							<div class="member__bio">
							
								<p>Casey Dodd is an established artist that has created animation concepts, character designs, storyboards, attraction concepts and much more for well renown clients including Universal Studios, The Walt Disney Company, Nickelodeon, MTV Productions, and the Landmark Entertainment Group. His work with Planet C Studios spans original cartoon series development (<a href="/work/harry-hare/">Harry Hare</a>), Universal Studios Hollywood Halloween Horror Nights attraction / character conceptualization, and new theme park attraction designs. Some of his extensive work can be found here: <a href="https://www.caseydodd.com">View Portfolio</a>.</p>

							</div>

						</li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</section>