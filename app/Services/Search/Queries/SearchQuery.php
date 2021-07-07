<?php

namespace App\Services\Search\Queries;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Closure;


class SearchQuery
{
	public function handle($request, Closure $next)
	{
		if(request('query') != '') {

			$data = $next($request);

	        $data['builder']->where(function($query) use ($data) {

				foreach($data['columns'] as $column) {
					$query->orWhere($column, 'LIKE', '%' . request('query') . '%');
				}
						
	        });

			return $data;

		}

		return $next($request);
	}

}