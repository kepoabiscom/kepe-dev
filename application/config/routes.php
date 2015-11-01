<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// For launch KepoAbis.com
date_default_timezone_set("Asia/Jakarta");

$launch_date = "2015-08-01 20:15:00";
$d1 = new DateTime("now");
$d2 = new DateTime($launch_date);
$diff = $d2->format('U') - $d1->format('U');

$set_maintenance = ($diff < 0) ? false : true;


$route['default_controller'] = (!$set_maintenance) ? "home" : "maintenance";
$route['admin'] = "admin/dashboard/index";
$route['category-article'] = "admin/category_article";
$route['category-news'] = "admin/category_news";
$route['category-video'] = "admin/category_video";
$route['comment-notif'] = "admin/comment_notif";
$route['activity-history'] = "admin/activity_history";
$route['inbox-message'] = "admin/inbox_message";
$route['static-content'] = "admin/static_content";
$route['video-competition'] = "competition/video_competition";
$route['404_override'] = 'Page_404';
$route['cron'] = 'Page_404';
$route['sitemap\.xml'] = "feeds/sitemap";
$route['api/users/u/(:num)'] = 'api/users/u/id/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */