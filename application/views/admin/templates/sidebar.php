<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php 
            $data = array('home', 'profile', 'user', 'news', 'article', 'video', 'category', 'about');
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
        <li class="<?php echo $active[2]; ?>">
            <a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-fw fa-table"></i>&nbsp;User Management</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i>&nbsp;Content Management<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li class="<?php echo $active[3]; ?>">
                    <a href="#">News</a>
                </li>
                <li class="<?php echo $active[4]; ?>">
                    <a href="#">Article</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo $active[5]; ?>">
            <a href="#"><i class="fa fa-fw fa-desktop"></i>&nbsp;Video Management</a>
        </li>
        
        <li class="<?php echo $active[6]; ?>">
            <a href="#"><i class="fa fa-fw fa-wrench"></i>&nbsp;Category Management</a>
        </li>
        <li class="<?php echo $active[7]; ?>">
            <a href="#"><i class="fa fa-fw fa-file"></i>&nbsp;About</a>
        </li>
    </ul>
</div>