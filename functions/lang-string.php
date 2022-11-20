<?php

if (function_exists('pll_register_string')) {
	$langStrings = [
		[
			"name" => 'book_now',
			"string" => 'Book now',
			"group" =>'button',
			"multiline" =>false
		],
		[
			"name" => 'content_contact_messenger_footer',
			"string" => 'Contact us today for a no-obligation Design Consultation!',
			"group" =>'footer',
			"multiline" =>false
		],
		[
			"string" => 'Schedule Your Design Consultation',
			"group" =>'button',
			"multiline" =>false
		],
		[
			"string" => 'About us',
			"group" =>'section',
			"multiline" =>false
		],
		[
			"string" => 'Our Services',
			"group" =>'title_section_home',
			"multiline" =>false
		],
		[
			"string" => 'Our Partners',
			"group" =>'title_section_home',
			"multiline" =>false
		],
		[
			"string" => 'Latest projects',
			"group" =>'title_section_home',
			"multiline" =>false
		],
		[
			"string" => 'View projects more',
			"group" =>'button',
			"multiline" =>false
		],
		[
			"string" => 'Read more about our partners',
			"group" =>'button',
			"multiline" =>false
		],
		[
			"string" => 'Interior Design &amp; Professional Graphics Designer',
			"group" =>'string_project',
			"multiline" => true
		],
		[
			"string" => 'My Clients',
			"group" =>'string_project',
			"multiline" => true
		]
	];

	foreach ($langStrings as $langString) {
		if (!isset($langString['name']) || empty($langString['name'])) {
			$name = createSlug($langString['string'], '_');
			pll_register_string($name, $langString['string'], $langString['group'], $langString['multiline']);

		}
		else {
			pll_register_string($langString['name'], $langString['string'], $langString['group'], $langString['multiline']);
		}
	}
}

function createSlug($str, $delimiter = '-'){

	$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	return $slug;

}
