<?php
global $wpscf_token;

class ninosocial_widget extends WP_Widget {
	
	// Constructor //
	function ninosocial_widget() {
		
		$widget_ops = array(
				'classname' => 'ninosocial_widget',
				'description' => 'Add Nino Social widget.'
		); // Widget Settings
		$control_ops = array('id_base' => 'ninosocial_widget'); // Widget Control Settings
		$this->WP_Widget('ninosocial_widget', 'Nino Social', $widget_ops, $control_ops); // Create the widget
	}
	
	// Extract Args
	function widget($args, $instance) {
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
	
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		
		// Run the code and display the output
		ninosocial_enqueue_front_scripts();
		echo $ninosocial_render_form = ninosocial_render_form();
		
		echo $args['after_widget'];
		
		
	}
	
	// Update Settings //
	function update($new_instance, $old_instance) {
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'ninosocial_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
}


add_action('widgets_init', create_function('', 'return register_widget("ninosocial_widget");'));