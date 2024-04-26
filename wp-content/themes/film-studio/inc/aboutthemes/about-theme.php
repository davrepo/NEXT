<?php
/**
 * Theme Page
 *
 * @package Film Studio
 */

if ( ! defined( 'FILM_STUDIO_FREE_THEME_URL' ) ) {
	define( 'FILM_STUDIO_FREE_THEME_URL', 'https://www.seothemesexpert.com/wordpress/free-film-wordpress-themes/' );
}
if ( ! defined( 'FILM_STUDIO_PRO_THEME_URL' ) ) {
	define( 'FILM_STUDIO_PRO_THEME_URL', 'https://www.seothemesexpert.com/wordpress/film-studio-website-template/' );
}
if ( ! defined( 'FILM_STUDIO_DEMO_THEME_URL' ) ) {
	define( 'FILM_STUDIO_DEMO_THEME_URL', 'https://seothemesexpert.com/demo/film-studio/' );
}
if ( ! defined( 'FILM_STUDIO_DOCS_THEME_URL' ) ) {
    define( 'FILM_STUDIO_DOCS_THEME_URL', 'https://www.seothemesexpert.com/docs/film-studio-website-template-pro/' );
}
if ( ! defined( 'FILM_STUDIO_RATE_THEME_URL' ) ) {
    define( 'FILM_STUDIO_RATE_THEME_URL', 'https://wordpress.org/support/theme/film-studio/reviews/#new-post' );
}
if ( ! defined( 'FILM_STUDIO_SUPPORT_THEME_URL' ) ) {
    define( 'FILM_STUDIO_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/film-studio/' );
}

/**
 * Add theme page
 */
function film_studio_menu() {
	add_theme_page( esc_html__( 'About Theme', 'film-studio' ), esc_html__( 'About Theme', 'film-studio' ), 'edit_theme_options', 'film-studio-about', 'film_studio_about_display' );
}
add_action( 'admin_menu', 'film_studio_menu' );

/**
 * Display About page
 */
function film_studio_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'film-studio' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'film-studio-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'film-studio-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'film-studio' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'film-studio-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'film-studio' ); ?></a>
		</nav>

		<?php
			film_studio_main_screen();

			film_studio_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'film-studio' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'film-studio' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'film-studio' ) : esc_html_e( 'Go to Dashboard', 'film-studio' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function film_studio_main_screen() {
	if ( isset( $_GET['page'] ) && 'film-studio-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'film-studio' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'film-studio' ) ?><span class="usecode">" STEPro10 "</span></p>
					<p><a href="<?php echo esc_url( FILM_STUDIO_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'film-studio' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'film-studio' ); ?></h2>
					<p><?php esc_html_e( 'Know more about film studio.', 'film-studio' ) ?></p>
					<p><a href="<?php echo esc_url( FILM_STUDIO_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'film-studio' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'film-studio' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'film-studio' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'film-studio' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'film-studio' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'film-studio' ) ?></p>
					<p><a href="<?php echo esc_url( FILM_STUDIO_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'film-studio' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'film-studio' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'film-studio' ) ?></p>
					<p><a href="<?php echo esc_url( FILM_STUDIO_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'film-studio' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $film_studio_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $film_studio_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'film-studio' ); ?>: <?php echo esc_html($film_studio_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( FILM_STUDIO_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'film-studio' ); ?></a>

						<a href="<?php echo esc_url( FILM_STUDIO_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'film-studio' ); ?></a>

						<!-- <a href="<?php echo esc_url( FILM_STUDIO_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'film-studio' ); ?></a> -->
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $film_studio_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function film_studio_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( FILM_STUDIO_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'film-studio' ); ?></a>

					<a href="<?php echo esc_url( FILM_STUDIO_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'film-studio' ); ?></a>

					<!-- <a href="<?php echo esc_url( FILM_STUDIO_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'film-studio' ); ?></a> -->
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'film-studio' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'film-studio' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'film-studio' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'film-studio' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'film-studio' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(FILM_STUDIO_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'film-studio' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
