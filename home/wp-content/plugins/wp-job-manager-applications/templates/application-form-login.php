<p><?php echo apply_filters( 'job_manager_job_applications_login_required_message', sprintf( __( 'You must <a href="%s">sign in</a> to apply for this position.', 'wp-job-manager-applications' ), wp_login_url( get_permalink() ) ) ); ?></p>