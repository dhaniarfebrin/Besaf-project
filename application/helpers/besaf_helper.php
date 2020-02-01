<?php

function cek_session($role_id)
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') == 1) {
        // user
        redirect('user');
    } elseif ($ci->session->userdata('role_id') == 2) {
        // super admin
        redirect('admin');
    } else {
        return 'sek lur sabar';
    }
}

/* End of file besaf.php */
