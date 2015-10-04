<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php 
            $data = array('home', 'profile', 'user', 'content', 'article', 'news', 
                        'video', 'category', 'about', 'gallery', 'category_article', 
                        'category_video', 'category_news', 'comment_notif','static_content', 
                        'divisi', 'activity', 'service', 'inbox_message');
            $active = array_fill(0, count($data), '');
            $j = 0;
            foreach($data as $i) {
                if($i == $menu) {
                    $active[$j] = 'active';
                    break;
                }
                $j++;
            }
        ?>
        <li class="<?php echo $active[0]; ?>">
            <a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;Home</a>
        </li>
       <li class="<?php echo $active[1]; ?>">
            <a href="<?php echo base_url(); ?>admin/profile"><i class="fa fa-user"></i>&nbsp;Profile (<?php $data = $this->session->userdata('logged_in'); echo $data['username']; ?>)</a>
        </li>
        <?php $q = $this->session->userdata['logged_in']; if($q['role'] == "superadmin") { ?>
        <li class="<?php echo $active[2]; ?>">
            <a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-fw fa-table"></i>&nbsp;User Management</a>
        </li>
        <?php } ?>
        <li class="<?php echo $active[3]; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#content"><i class="fa fa-fw fa-edit"></i>&nbsp;Content Management<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="content" class="collapse">
                <li class="<?php echo $active[4]; ?>">
                    <a href="<?php echo base_url(); ?>admin/article">Article</a>
                </li>
                <li class="<?php echo $active[5]; ?>">
                    <a href="<?php echo base_url(); ?>admin/news">News</a>
                </li>
				<?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
				<li class="<?php echo $active[14]; ?>">
                    <a href="<?php echo base_url(); ?>admin/static-content">Static Content</a>
                </li>
				<?php } ?>
            </ul>
        </li>
        <?php if($q['role'] == "superadmin" or $q['role'] == "admin") { ?>
        <li class="<?php echo $active[6]; ?>">
            <a href="<?php echo base_url(); ?>admin/video"><i class="fa fa-fw fa-desktop"></i>&nbsp;Video Management</a>
        </li>
        <?php } ?>
        <li class="<?php echo $active[9]; ?>">
            <a href="<?php echo base_url(); ?>admin/gallery"><i class="fa fa-fw fa-desktop"></i>&nbsp;Gallery Management</a>
        </li>
		<?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[7]; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#category"><i class="fa fa-fw fa-edit"></i>&nbsp;Category Management<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="category" class="collapse">
                <li class="<?php echo $active[10]; ?>">
                    <a href="<?php echo base_url(); ?>admin/category-article">&nbsp;Category Article</a>
                </li>
                <li class="<?php echo $active[12]; ?>">
                    <a href="<?php echo base_url(); ?>admin/category-news">&nbsp;Category News</a>
                </li>
                <li class="<?php echo $active[11]; ?>">
                    <a href="<?php echo base_url(); ?>admin/category-video">&nbsp;Category Video</a>
                </li>
            </ul>
        </li>
		<?php } ?>
        <?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[13]; ?>">
            <a href="<?php echo base_url(); ?>admin/comment-notif"> <i class="fa fa-bell"></i>&nbsp;Comment Notif <?php $data = $this->session->userdata('counter_comment_notif'); echo "(<strong>" . $data['counter'] . " New</strong>)"; ?></a>
        </li>
        <?php } ?>
        <?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[16]; ?>">
            <a href="<?php echo base_url(); ?>admin/activity-history"> <i class="fa fa-fw fa-table"></i>&nbsp;Activity History</a>
        </li>
        <?php } ?>
        <?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[18]; ?>">
            <a href="<?php echo base_url(); ?>admin/inbox-message"> <i class="fa fa-bell"></i>&nbsp;Inbox Message <?php $data = $this->session->userdata('counter_new_message'); echo "(<strong>" . $data['counter'] . " New</strong>)"; ?></a>
        </li>
        <?php } ?>
		<?php if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[8]; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#about"><i class="fa fa-fw fa-file"></i>&nbsp;About Us<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="about" class="collapse">
                <li class="<?php echo $active[8]; ?>">
                    <a href="<?php echo base_url(); ?>admin/about">&nbsp;About</a>
                </li>
                <li class="<?php echo $active[8]; ?>">
                    <a href="<?php echo base_url(); ?>admin/divisi">&nbsp;Division</a>
                </li>
                <li class="<?php echo $active[8]; ?>">
                    <a href="<?php echo base_url(); ?>admin/service">&nbsp;What We Do!</a>
                </li>
            </ul>
            
        </li>
		<?php } ?>
        <li>
            <?php $x = $this->session->userdata('last_login'); ?>
            <a></a>
        </li>
    </ul>
</div>