<?php
/**
 * Widget: Profile / Author Card
 *
 * @package Functionalities_Theme
 */

class FT_Widget_Profile extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'ft_profile_widget',
            esc_html__( 'FT: Profile Card', 'functionalities-theme' ),
            array( 'description' => esc_html__( 'Displays a user profile/bio card.', 'functionalities-theme' ), )
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
        
        $user_id = ! empty( $instance['user_id'] ) ? absint( $instance['user_id'] ) : 1;
        $user    = get_userdata( $user_id );
        
        if ( $user ) {
            ?>
            <div class="profile-card">
                <div class="profile-avatar">
                    <?php echo get_avatar( $user->ID, 80 ); ?>
                </div>
                <h4 class="profile-name"><?php echo esc_html( $user->display_name ); ?></h4>
                <p class="profile-bio"><?php echo wp_kses_post( $user->description ); ?></p>
                
                <div class="profile-links">
                    <?php if ( ! empty( $user->user_url ) ) : ?>
                        <a href="<?php echo esc_url( $user->user_url ); ?>" class="btn btn-sm btn-outline">
                            <?php esc_html_e( 'Website', 'functionalities-theme' ); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>" class="btn btn-sm btn-primary">
                        <?php esc_html_e( 'View Posts', 'functionalities-theme' ); ?>
                    </a>
                </div>
            </div>
            <?php
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
        $title   = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $user_id = ! empty( $instance['user_id'] ) ? $instance['user_id'] : 1;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'functionalities-theme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>"><?php esc_html_e( 'User ID:', 'functionalities-theme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'user_id' ) ); ?>" type="number" value="<?php echo esc_attr( $user_id ); ?>">
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
        $instance['title']   = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? absint( $new_instance['user_id'] ) : 1;

        return $instance;
    }

}
