<?php
    $loguser = $this->request->session()->read('Auth.User');
if(empty($loguser))
    $loguser = ['username' => ''];

?>

<div class="top-bar-section">
    <ul class="right">
        <li class="layout-profile">
            <span>Welcome </span> <?php echo $loguser['username'];?>
        </li>
        <li>
            <?php echo $this->Html->link('Logout',array('controller' => 'Users', 'action' => 'logout'));?>
        </li>
    </ul>
</div>