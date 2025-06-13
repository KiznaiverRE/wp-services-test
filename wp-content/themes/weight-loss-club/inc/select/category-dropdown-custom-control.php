<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

  // Customizer slider control
  class Weight_Loss_Club_Slider_Custom_Control extends WP_Customize_Control {
    public $type = 'slider_control';
    public function enqueue() {
      wp_enqueue_script( 'weight-loss-club-controls-js', trailingslashit( esc_url(get_template_directory_uri()) ) . 'js/custom-controls.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
      wp_enqueue_style( 'weight-loss-club-controls-css', trailingslashit( esc_url(get_template_directory_uri()) ) . 'css/custom-controls.css', array(), '1.0', 'all' );
    }
    public function render_content() {
    ?>
      <div class="slider-custom-control">
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value"  <?php $this->link(); ?> />
        <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
      </div>
    <?php
    }
  }
  
?>