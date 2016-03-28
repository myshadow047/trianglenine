<?php

function _profile_group($value) {
    return $value['name'];
}

$excludes = array('id', 'password');
?>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->uri->uri_string, 'title' => l('Profile')),
))
?>

<style type="text/css">
    #profile-fieldset { position: relative; }
    #profile-fieldset img {
        position: absolute;
        right: 0;
        margin: 10px 20px;
    }
</style>

<div class="clear"></div>

<fieldset id="profile-fieldset">
    <legend><?php echo l('User Profile') ?></legend>


    <div>
        <label><?php echo l('Username') ?></label>
        <span><?php echo $data['username'] ?></span>
    </div>
    <div>
        <label><?php echo l('Email') ?></label>
        <span><?php echo $data['email'] ?></span>
    </div>
    <div>
        <label><?php echo l('Full Name') ?></label>
        <span><?php echo @$data['first_name'].' '.@$data['last_name'] ?></span>
    </div>
    <div>
        <label><?php echo l('Gender') ?></label>
        <span><?php echo format_param_short($data['gender'], 'gender') ?></span>
    </div>
    <div class="clear"></div>
    <div>
        <label><?php echo l('Phone No') ?></label>
        <span><?php echo (empty($data['phone'])) ? '' : $data['phone'] ?></span>
    </div>
    <div class="clear"></div>
    <div>
        <label><?php echo l('Role') ?></label>
        <span>
        <?php foreach($data['role'] as $role): ?>
        <div><?php echo $role['name'] ?></div>
        <?php endforeach ?>
        </span>
    </div>
    <div>
        <label><?php echo l('Last Login') ?></label>
        <span><?php echo @$data['last_login'] ?></span>
    </div>
</fieldset>
