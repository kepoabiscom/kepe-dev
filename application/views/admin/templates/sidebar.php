<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php 
            $data = array('home', 'profile', 'user', 'content', 'article', 'news', 'video', 'category', 'about');
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
        <?php $q = $this->session->userdata['logged_in']; if($q['role'] == "superadmin" || $q['role'] == "admin") { ?>
        <li class="<?php echo $active[2]; ?>">
            <a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-fw fa-table"></i>&nbsp;User Management</a>
        </li>
        <?php } ?>
        <li class="<?php echo $active[3]; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i>&nbsp;Content Management<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li class="<?php echo $active[4]; ?>">
                    <a href="<?php echo base_url(); ?>admin/article">Article</a>
                </li>
                <li class="<?php echo $active[5]; ?>">
                    <a href="#">News</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo $active[6]; ?>">
            <a href="<?php echo base_url(); ?>admin/video"><i class="fa fa-fw fa-desktop"></i>&nbsp;Video Management</a>
        </li>
        
        <li class="<?php echo $active[7]; ?>">
            <a href="#"><i class="fa fa-fw fa-wrench"></i>&nbsp;Category Management</a>
        </li>
        <li class="<?php echo $active[8]; ?>">
            <a href="#"><i class="fa fa-fw fa-file"></i>&nbsp;About</a>
        </li>
    </ul>
</div>