<?php

namespace App\Services\Search;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pipeline\Pipeline;


class SearchBuilder
{
	public function __construct($builder, Request $request)
	{
		$this->builder = $builder;
		$this->request = $request;

	}


	public function applyFiltersAndQueries($columns = null)
	{
		return app()->make(Pipeline::class)
						->send([
							'builder' => $this->builder, 
							'columns' => $columns,
						])
						->through([
							\App\Services\Search\Queries\SearchQuery::class,
						])
						->thenReturn();

	}


}