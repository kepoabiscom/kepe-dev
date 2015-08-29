<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
<url>
    <loc><?php echo base_url();?></loc>
    <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
{get_sitemap}
<url>
	<loc>{loc}</loc>
	<lastmod>{lastmod}</lastmod>
	<priority>{priority}</priority>
	<changefreq>{changefreq}</changefreq>
 </url>
 {/get_sitemap}
</urlset>