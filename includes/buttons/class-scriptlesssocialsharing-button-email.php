<?php
/**
 * Copyright (c) 2018 Robin Cornett
 */

class ScriptlessSocialSharingButtonEmail extends ScriptlessSocialSharingOutput {

	/**
	 * Get the email URL.
	 * @param $attributes array
	 *
	 * @return string
	 * @since 2.0.0
	 */
	protected function get_url( $attributes ) {
		return add_query_arg(
			array(
				'body'    => $this->email_body() . ' ' . $this->get_permalink( 'email' ),
				'subject' => $this->email_subject() . ' ' . $attributes['title'],
			),
			'mailto:'
		);
	}

	/**
	 * body text for the email button
	 * @return string can be modified via filter
	 */
	protected function email_body() {
		return apply_filters( 'scriptlesssocialsharing_email_body', __( 'I read this post and wanted to share it with you. Here\'s the link:', 'scriptless-social-sharing' ) );
	}

	/**
	 * subject line for the email button
	 * @return string can be modified via filter
	 */
	protected function email_subject() {
		$setting = $this->get_setting();
		return apply_filters( 'scriptlesssocialsharing_email_subject', $setting['email_subject'] );
	}
}