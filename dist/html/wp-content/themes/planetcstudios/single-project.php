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

	<div class="project">

		<div class="project__overview">

			<h1 class="project__title">Title of Project</h1>

			<div class="project__meta">

				<!-- 
					
					Two sizes are available:
						
					1. cover-large, 380 x 560, for higher density screens.
					2. cover-small, 190 x 288, the default output.

				-->

				<div class="project__cover">

					<img src="https://via.placeholder.com/190x280.png?text=Cover+(190x280)" alt="The cover image for Title of Project" srcset="https://via.placeholder.com/380x560.png?text=Cover+(380x560) 2x" width="190" height="280" decoding="async" loading="lazy" class="project__img" />

				</div>

				<div class="project__details">

					<div class="project__description">

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate, ducimus nemo sint minus alias laboriosam itaque tenetur fugit rerum ut minima in ab quam inventore fuga blanditiis. Sed, optio!</p>

					</div>

					<div class="project__date">May 2015</div>

					<div class="project__location">Universal Studios Tour</div>

					<div class="project__client">

						<span class="project__label">Client:</span> Universal Studios Hollywood

					</div>

				</div>

			</div>

		</div>

		<div class="project__samples">

			<div class="samples__title">

				<ul class="samples__list">

					<!-- Example still image -->

					<li class="sample__item sample__item--still">

						<img src="https://via.placeholder.com/600x400.png?text=Still+(600x400)" alt="A project sample image still" width="600" height="400" decoding="async" loading="lazy" class="sample__img" />

					</li>

					<!-- Example YouTube video. -->

					<li class="sample__item sample__item--video">

						<img src="https://via.placeholder.com/600x400.png?text=Video+(600x400)" alt="A project sample video" width="600" height="400" decoding="async" loading="lazy" class="sample__img" />

					</li>

					<!-- Example Vimeo video. -->

					<li class="sample__item sample__item--video">

						<img src="https://via.placeholder.com/600x400.png?text=Video+(600x400)" alt="A project sample video" width="600" height="400" decoding="async" loading="lazy" class="sample__img" />

					</li>

				</ul>

			</div>

			<div class="samples__nav">

				<ul class="samples__thumbnails">

					<li class="sample__thumbnail">

						<img src="https://via.placeholder.com/100x50.png?text=Thumbnail+(100x50)" alt="The thumbnail image for sample image still" width="100" height="50" decoding="async" loading="lazy" class="sample__img" />

					</li>

					<li class="sample__thumbnail">

						<img src="https://via.placeholder.com/100x50.png?text=Thumbnail+(100x50)" alt="The thumbnail image for sample YouTube video" width="100" height="50" decoding="async" loading="lazy" class="sample__img" />

					</li>

					<li class="sample__thumbnail">

						<img src="https://via.placeholder.com/100x50.png?text=Thumbnail+(100x50)" alt="The thumbnail image for sample Vimeo video" width="100" height="50" decoding="async" loading="lazy" class="sample__img" />

					</li>

				</ul>

			</div>

		</div>

<?php get_footer(); ?>