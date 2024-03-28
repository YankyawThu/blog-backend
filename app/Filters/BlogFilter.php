<?php

namespace App\Filters;

class BlogFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'keyword',
	];

	/**
	 * Filter by keyword.
	 */
	public function keyword($value) 
	{
		return $this->builder->where('title', 'LIKE', "%{$value}%");
	}

}