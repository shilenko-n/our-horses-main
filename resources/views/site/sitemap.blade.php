<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	@foreach($pages as $page)
		<url>
			<loc>{{ route('site.pages', $page->_lft == 1 ? null : compact('page')) }}</loc>
			<lastmod>{{ $page->blocks()->latest()->first([ 'updated_at' ])->updated_at }}</lastmod>
			<changefreq>monthly</changefreq>
			<priority>1</priority>
		</url>
	@endforeach

</urlset>
