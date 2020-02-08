<?php
class json_api_sitedata_controller {
/**put your functions here to return data e.g.  Do the WP queries and then return on the info you want in a loop*/
	
	public function contact () {

		query_posts( array ( 'post_type' => 'contact' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'address' => get_field('contact_address'),
				'phone' => get_field('contact_phone'),
				'map' => get_field('contact_map'),
				'contacts' => get_field('contacts'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);
	}

	public function header () {

		query_posts( array ( 'post_type' => 'header' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'img' => get_field('header_img'),
				'loaded' => false
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);
	}

	public function about () {

		query_posts( array ( 'post_type' => 'about' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'desc' => get_field('about_desc'),
				'img' => get_field('about_img'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);
	}

	public function team () {

		query_posts( array ( 'post_type' => 'team' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'bio' => get_field('team_bio'),
				'position' => get_field('team_position'),
				'link' => get_field('team_link'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);
	}

	public function services () {

		query_posts( array ( 'post_type' => 'services' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'icon' => get_field('service_icon'),
				'desc' => get_field('service_desc'),
				'expand' => get_field('service_expand'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);


	}


	public function news () {

		query_posts( array ( 'post_type' => 'news' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'img' => get_field('news_img'),
				'news_header' => get_field('news_header'),
				'desc' => get_field('news_desc'),
				'short_desc' => get_field('news_short_desc'),
				'ext_link' => get_field('news_ext_link'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);


	}

	

	public function candidates () {

		query_posts( array ( 'post_type' => 'candidates' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'desc' => get_field('candidates_desc'),
				'signature' => get_field('candidates_signature'),
				'photo' => get_field('candidates_photo'),
				'name' => get_field('candidates_name'),
				'position' => get_field('candidates_position'),
				'link' => get_field('candidates_link')
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);



	}

	public function position () {

		query_posts( array ( 'post_type' => 'position' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'title' => get_the_title(),
				'location' => get_field('position_location'),
				'desc' => get_field('position_desc'),
				'salary' => get_field('position_salary'),
				'url' => get_field('position_url'),
				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);



	}

	public function talent () {

		query_posts( array ( 'post_type' => 'talent' ) );

		$data = array();

		while ( have_posts() ) : the_post();

			$post = get_post(get_the_ID());

			$entry = array(
				'id' => $post->post_name,
				'img' => get_the_post_thumbnail_url( ),
				'name' => get_the_title(),
				'title' => get_field('title'),
				'skills' => get_field('skills'),
				'experience' => get_field('experience'),
				'education' => get_field('education'),
				'bio' => get_field('bio'),
				'accomplishments' => get_field('accomplishments'),
				'resume' => get_field('resume'),

				);
			$data[] = $entry;
		endwhile;

		return array(
			'status' => 'ok',
			'data' => $data
		);



	}

	

	public function getmyname() {

		$thename = 'TVGLA';

		return array(
			'status' => 'ok',
			'name' => $thename
		);

	}


}

?>