<sitemapindex xmlns="http://www.google.com/schemas/sitemap/0.84">
 <sitemap>
    <loc><?php echo base_url();?></loc>
    <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    <priority>1.0</priority>
 </sitemap>
 {get_sitemap}
	<sitemap>
		<loc>{loc}</loc>
		<lastmod>{lastmod}</lastmod>
		<priority>{priority}</priority>
	 </sitemap>
 {/get_sitemap}
</sitemapindex>