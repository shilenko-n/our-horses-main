<?php

namespace App\View\Composers;

use Illuminate\View\View;

class PaginateComposer
{
	public function compose(View $view)
	{
		$paginator = $view->paginator;
		$current_page = $paginator->currentPage();
		$last_page = $paginator->lastPage();

		$pages_without_dots = 5;
		$pages_on_sides = 3;
		$pages_around_current = 1;
		$ranges = [];

		if ($last_page <= $pages_without_dots) {
			$ranges[] = $paginator->getUrlRange(1, $last_page);
		} else

		if ($current_page < $pages_on_sides) {
			$ranges[] = $paginator->getUrlRange(1, $pages_on_sides);
			$ranges[] = $paginator->getUrlRange($last_page, $last_page);
		} else

		if ($current_page >= $pages_on_sides && $current_page <= $last_page - $pages_on_sides + 1) {
			$ranges[] = $paginator->getUrlRange(1, 1);
			$ranges[] = $paginator->getUrlRange($paginator->currentPage() - $pages_around_current, $paginator->currentPage() + $pages_around_current);
			$ranges[] = $paginator->getUrlRange($last_page, $last_page);
		} else

		if ($current_page > $last_page - $pages_on_sides + 1) {
			$ranges[] = $paginator->getUrlRange(1, 1);
			$ranges[] = $paginator->getUrlRange($last_page - $pages_on_sides + 1, $last_page);
		}

		$view->with('ranges', $ranges);
	}
}
