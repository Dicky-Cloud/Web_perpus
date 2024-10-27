<?php
function check_login()
{
    $CI =& get_instance(); // Mendapatkan instance CodeIgniter

    if (!$CI->session->userdata('user_id')) {
        // Jika pengguna belum login, redirect ke halaman login
        redirect('auth');
    }
}
