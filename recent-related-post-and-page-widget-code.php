<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Adds widget.
 */
class R_P_OR_R_P extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'rp_and_rp', // Base ID
			' Recent Related Post And Page', // Name
			array(
				'description' => 'Display Related And Recent Posts',
				'text_domain',
			) // Args
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		$Title = apply_filters( 'Abt_widget_title', $instance['Title'] );
		echo wp_kses_post( $args['before_widget'] );

		$ABTId = apply_filters( 'abt_widget_shortcode', $instance['Shortcode'] );

		if ( is_numeric( $ABTId ) ) {
			if ( ! empty( $instance['Title'] ) ) {
				echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['Title'] ) . $args['after_title'] );
			}
			echo do_shortcode( '[RRPP id=' . $ABTId . ']' );
		} else {
			echo '<p>' . esc_html__( 'Sorry! No Related-posts-and-recent posts Shortcode Found', WL_R_P_R_P ) . '</p>';
		}
		echo wp_kses_post( $args['after_widget'] );
		wp_reset_query();
	}

	// Back-end widget form.
	public function form( $instance ) {
		if ( isset( $instance['Title'] ) ) {
			$Title = $instance['Title'];
		} else {
			$Title = ' Recent Related Post And Page';
		}

		if ( isset( $instance['Shortcode'] ) ) {
			$Shortcode = $instance['Shortcode'];
		} else {
			$Shortcode = 'Select Any Recent Related Post And Page settings';
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Title' ) ); ?>"><?php echo esc_html( 'Widget Title' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'Title' ) ); ?>" type="text" value="<?php echo esc_attr( $Title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Shortcode' ) ); ?>"><?php echo esc_html( 'Select Any' ); ?>
				(Required)</label>
			<?php
			/**
			 * Get All about_m_e Shortcode Custom Post Type
			 */
			$RPARP_CPT_Name  = 'rp_and_rp';
			$RPARP_All_Posts = wp_count_posts( $RPARP_CPT_Name )->publish;
			global $All_RPARP;
			$All_RPARP = array(
				'post_type'      => $RPARP_CPT_Name,
				'orderby'        => 'ASC',
				'posts_per_page' => $RPARP_All_Posts,
			);
			$All_RPARP = new WP_Query( $All_RPARP );
			?>
			<select id="<?php echo esc_attr( $this->get_field_id( 'Shortcode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'Shortcode' ) ); ?>" style="width: 100%;">
				<option value="<?php echo esc_attr( 'Select Any Settings' ); ?>" 
										  <?php
											if ( $Shortcode == 'Select Any Settings' ) {
																					echo esc_html( 'selected="selected"' );
											}
											?>
																				>
					Select Any Settings
				</option>
				<?php
				if ( $All_RPARP->have_posts() ) {
					?>
					<?php
					while ( $All_RPARP->have_posts() ) :
						$All_RPARP->the_post();
						$PostId    = get_the_ID();
						$PostTitle = get_the_title( $PostId );
						?>
						<option value="<?php echo esc_attr( $PostId ); ?>" 
												  <?php
													if ( $Shortcode == $PostId ) {
																				esc_html_e( 'selected="selected"' );
													}
													?>
																			>
																			<?php
																			if ( $PostTitle ) {
																															   esc_html_e( $PostTitle );
																			} else {
																				esc_html_e( 'No Title', WL_R_P_R_P );
																			}
																			?>
																					</option>
					<?php endwhile; ?>
					<?php
				} else {
					echo '<option>' . esc_html__( 'Sorry! No Related-posts-and-recent posts Shortcode Found', WL_R_P_R_P ) . '</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['Title']     = ( ! empty( $new_instance['Title'] ) ) ? strip_tags( $new_instance['Title'] ) : '';
		$instance['Shortcode'] = ( ! empty( $new_instance['Shortcode'] ) ) ? strip_tags( $new_instance['Shortcode'] ) : 'Select Any Recent Related Post And Page';
		return $instance;
	}
} // end of class Related-posts-and-recent posts Shortcode Shortcode Pro Widget Class

// Register Related-posts-and-recent posts Shortcode Shortcode Pro Widget
add_action( 'widgets_init', 'register_R_P_OR_R_P' );
function register_R_P_OR_R_P() {
	register_widget( 'R_P_OR_R_P' );
}
?>
