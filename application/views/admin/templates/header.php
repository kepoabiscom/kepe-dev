<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="dashboard">Dashboard - KepoAbis.com</a>
</div>
<!-- Top Menu Items -->

<ul class="nav navbar-right top-nav">
     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
            <li>
                <a href="<?php echo base_url() . "admin/comment-notif"; ?>"><span class="label label-default"><?php $data = $this->session->userdata('counter_comment_notif'); echo $data['counter']; ?> New Comments</span></a>
            </li>
            <li>
                <a href="<?php echo base_url() . "admin/inbox-message"; ?>"><span class="label label-primary"><?php $data = $this->session->userdata('counter_new_message'); echo $data['counter']; ?> New Messages</span></a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo base_url() . "admin/comment-notif"; ?>">View All</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i>&nbsp; <?php $data = $this->session->userdata('logged_in'); echo $data['username']; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?php echo base_url() . "admin/profile"; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo base_url(); ?>admin/dashboard/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>