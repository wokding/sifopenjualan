<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        // Controllers yang boleh diakses tanpa menu check
        $allowedControllers = ['auth', 'transaksi'];
        if (in_array(strtolower($menu), $allowedControllers)) {
            return;
        }

        // Get menu by comparing with lowercase to handle case sensitivity
        $queryMenu = $ci->db->query("SELECT id FROM user_menu WHERE LOWER(menu) = LOWER(?)", [$menu])->row_array();
        
        // Jika menu tidak ditemukan
        if (!$queryMenu) {
            redirect('auth/blocked');
            return;
        }

        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
