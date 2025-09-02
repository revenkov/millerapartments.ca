<?php
add_action('wp_ajax_get_welcome_popup', 'selectrum_get_popup');
add_action('wp_ajax_nopriv_get_welcome_popup', 'selectrum_get_popup');
function selectrum_get_popup() {
	ob_start();
	locate_template('parts/popup.php', true);
	$content = ob_get_clean();
	if ( !empty( $content ) ) :
		wp_send_json_success(['content'=>$content]);
	endif;

	wp_send_json_error();
}



//Newsletter form handler
add_action( 'wp_ajax_newsletter_form', 'gvh_newsletter_form' );
add_action( 'wp_ajax_nopriv_newsletter_form', 'gvh_newsletter_form' );
function gvh_newsletter_form() {

	$response = array();
	$email = sanitize_email( $_POST['email'] );

	try {
		if ( empty( $email ) ) {
			throw new Exception( __( 'Please enter your email.', 'selectrum' ) );
		}

		$message = 'Thank you for registering!';
		$MailChimp = new \DrewM\MailChimp\MailChimp(MAILCHIMP_API_KEY);
		$subscriber_hash = $MailChimp->subscriberHash($email);
		$result = $MailChimp->get("lists/".MAILCHIMP_LIST_ID."/members/".$subscriber_hash);
		//error_log( print_r( $result, true ) );
		switch ($result['status'] ) :
			case '404':
				$MailChimp->post("lists/".MAILCHIMP_LIST_ID."/members", [
					'email_address' => $email,
					'status'        => 'subscribed',
					//'tags'          => $_POST['tags'],
					/*'merge_fields'  => array(
						//'FNAME' => $_POST['fullName'],
						//'MMERGE4' => $_POST['phone']
					)*/
				]);
				//$message = __('Please check your email for confirmation.', 'selectrum');
				break;
			case 'subscribed':
				$tags = array();
				foreach ( $_POST['tags'] as $tag ) :
					$tags[] = array(
						'name' => $tag,
						'status' => 'active'
					);
				endforeach;
				$MailChimp->post("lists/".MAILCHIMP_LIST_ID."/members/".$subscriber_hash."/tags", [
					'tags' => $tags,
				]);
				break;
		endswitch;

		//error_log( print_r($MailChimp->getLastResponse(), true) );

		if ( !$MailChimp->success() ) :
			$response = $MailChimp->getLastResponse();
			$response_body = json_decode( $response['body'] );
			switch ( $response_body->title ) :
				case 'Member Exists':
					$message = __('You are subscribed already, thank you!', 'selectrum');
					break;
				default:
                    error_log( print_r( $response_body, true ) );
					$message = __('Something went wrong. Please contact us and describe your problem.', 'selectrum');
					break;
			endswitch;
			throw new Exception( $message );
		endif;

		/*
		$message = '
			Full name: '.$_POST['fullName'].'<br>
			Email: '.$_POST['email'].'<br>
			Phone: '.$_POST['phone'].'<br>
			Lists: '.implode( ', ', $_POST['tags'] ).'
		';
		*/
		//$headers  = "MIME-Version: 1.0" . "\r\n";
		//$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		//$headers .= "From: Glenview Homes Website <info@glenviewhomes.com>" . "\r\n";
		//wp_mail('sales@glenview.ca', 'Registration for Community', $message, $headers);
		//wp_mail('mpage@selectrum.com', 'Registration for Community', $message, $headers);

		$response['message'] = '<div class="popup">'.$message.'</div>';
		wp_send_json_success($response);
	} catch ( Exception $e ) {
		wp_send_json_error( array( 'message' => $e->getMessage()) );
	}
}