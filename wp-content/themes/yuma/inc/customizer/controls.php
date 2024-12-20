<?php
/**
 * Customizer Controls
 *
 * @package yuma
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) :
	return null;
endif;




/**
 * Create a Radio-Image control
 * 
 * 
 * @link https://github.com/reduxframework/kirki/
 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
 */
Class Yuma_Radio_Image_Control extends WP_Customize_Control {
	
	/**
	 * Declare the control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'radio-image';
	
	/**
	 * Render the control to be displayed in the Customizer.
	 */
	public function render_content() {
		if ( empty( $this->choices ) )
			return;
		
		$name = '_customize-radio-' . $this->id;
		?>
		<span class="customize-control-title">
			<?php 
			echo esc_attr( $this->label );
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		</span>
		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) : ?>
					<label for="<?php echo esc_attr( $this->id ) . $value; ?>">
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</input>
					</label>
			<?php endforeach; ?>
		</div>
	<?php }
}


/**
 * Customize Control for Chosen Select Dropdown.
 *
 * @see WP_Customize_Control
 */
class Yuma_Dropdown_Chosen_Control extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="yuma-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

/**
 * Customize Control for Multiple Chosen Select Dropdown.
 *
 * @see WP_Customize_Control
 */
class Yuma_Dropdown_Multiple_Chosen_Control extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="yuma-chosen-select" multiple="multiple" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}


/**
 * Customize Control for Horizontal Line.
 *
 * @see WP_Customize_Control
 */
Class Yuma_Horizontal_Line extends WP_Customize_Control {
	public $type = 'hr';

	public function render_content() { ?>
		<div>
			<hr style="border: 1px solid #ccc;" />
		</div>
	<?php }
}

/**
 * Customize Control for Horizontal Line.
 *
 * @see WP_Customize_Control
 */
Class Yuma_Label_Description extends WP_Customize_Control {
	public $type = 'label';

	public function render_content() { ?>
		<label>
            <span class="customize-control-title">
            	<?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
            <span class="description customize-control-description">
            	<?php echo wp_kses_post($this->description); ?>
            </span>
            <?php } ?>
        </label>
	<?php }
}
