<?php

namespace App;

final class DatabaseOperations{


	/**
	 * Escape special characters for a LIKE query.
	 *
	 * @param string $value
	 * @param string $char
	 *
	 * @return string
	 * from: https://stackoverflow.com/questions/22749182/laravel-escape-like-clause/42028380#42028380
	 */
	public static function escape_like(string $value, string $char = '\\'): string
	{
	    return str_replace(
	        [$char, '%', '_'],
	        [$char.$char, $char.'%', $char.'_'],
	        $value
	    );
	}

	

}