<?php
/**
 * Widget: Stats
 *
 * @package Functionalities_Theme
 */

class FT_Widget_Stats extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'ft_stats_widget',
            esc_html__( 'FT: Stats Widget', 'functionalities-theme' ),
            array( 'description' => esc_html__( 'Displays a list of key-value stats.', 'functionalities-theme' ), )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
        }
        
        // Parse stats from newline separated text
        $stats_text = ! empty( $instance['stats_text'] ) ? $instance['stats_text'] : '';
        $stats_lines = explode( "\n", $stats_text );
        
        if ( ! empty( $stats_lines ) ) {
            echo '<div class="widget-stats">';
            foreach ( $stats_lines as $line ) {
                $parts = explode( '|', $line );
                if ( count( $parts ) >= 2 ) {
                    $label = trim( $parts[0] );
                    $value = trim( $parts[1] );
                    ?>
                    <div class="stat-row">
                        <span class="stat-label"><?php echo esc_html( $label ); ?></span>
                        <span class="stat-value"><?php echo esc_html( $value ); ?></span>
                    </div>
                    <?php
                }
            }
            echo '</div>';
        }
        
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $stats_text = ! empty( $instance['stats_text'] ) ? $instance['stats_text'] : "Posts | 12\nComments | 45\nViews | 1.2k";
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'functionalities-theme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'stats_text' ) ); ?>"><?php esc_html_e( 'Stats (Label | Value):', 'functionalities-theme' ); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'stats_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'stats_text' ) ); ?>" rows="5"><?php echo esc_textarea( $stats_text ); ?></textarea>
            <small><?php esc_html_e( 'Enter one stat per line. Format: Label | Value', 'functionalities-theme' ); ?></small>
        </p>
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['stats_text'] = ( ! empty( $new_instance['stats_text'] ) ) ? sanitize_textarea_field( $new_instance['stats_text'] ) : '';

        return $instance;
    }

}
