<?php
function check_permission($required_permission)
{
    $CI = &get_instance();
    $CI->load->model('UserManagement/RolePermission');
    $rolePermissions = $CI->RolePermission->getRolePermissions();
    $role = $CI->user['user_group'];
    if (isset($rolePermissions[$role]) && in_array($required_permission, $rolePermissions[$role])) {
        return true;
    } else {
        return false;
    }
}
function getRolePermissions()
{
    $CI = &get_instance();
    $CI->load->model('UserManagement/RolePermission');
    return $CI->RolePermission->getRolePermissions();
}