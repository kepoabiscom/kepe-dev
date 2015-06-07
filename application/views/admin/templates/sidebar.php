<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php 
            $data = array('home', 'user', 'video', 'news', 'article', 'category');
            $active = array_fill(0, 6, '');
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
            <a href="dashboard"><i class="fa fa-fw fa-dashboard"></i>Home</a>
        </li>
        <li class="<?php echo $active[1]; ?>">
            <a href="user"><i class="fa fa-fw fa-table"></i>User Management</a>
        </li>
        <li class="<?php echo $active[2]; ?>">
            <a href="#"><i class="fa fa-fw fa-desktop"></i>Video Management</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i>Content Manegement<i class="fa fa-fw fa-caret-down"></i></a>
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
            <a href="#"><i class="fa fa-fw fa-file"></i>Category Management</a>
        </li>
    </ul>
</div>