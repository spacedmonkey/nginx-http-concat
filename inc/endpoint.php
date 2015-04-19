<?php


class Concat_Endpoint {

	private $slug = '_static';

	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'template_redirect', array( $this, 'template_redirect' ) );
	}

	public function init() {
		add_rewrite_endpoint( $this->get_slug(), EP_ROOT );
	}

	function template_redirect() {
		if ( get_query_var( $this->get_slug() ) ) {
			require_once "ngx-http-concat.php";
			exit();
		}
	}

	/**
	 * @return string
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * @param string $name
	 */
	public function set_slug( $slug ) {
		$this->slug = $slug;
	}
}

$concat_endpoint = new Concat_Endpoint();