<?php

function human_time($time = false) {
    if (!$time) {
        $time = time();
    }
    //$human_datetime = unix_to_human($time);
    //$human_datetime = date('d  M  , Y',$time);
    $human_datetime = date('Y-m-d', $time);
    //$human_datetime = date('dS M , Y',$time);
    return $human_datetime;
}

function human_time_blog($time = false) {
    if (!$time) {
        $time = time();
    }
    //$human_datetime = unix_to_human($time);
    //$human_datetime = date('d  M  , Y',$time);
    $human_datetime = date('F d , Y', $time);
    //$human_datetime = date('dS M , Y',$time);
    return $human_datetime;
}

function human_time_view($time = false) {
    if (!$time) {
        $time = time();
    }
    //$human_datetime = unix_to_human($time);
    //$human_datetime = date('Y-m-d',$time);
    $human_datetime = date('d - M - Y', $time);
    return $human_datetime;
}

function last_login($time = false) {
    if (!$time) {
        $time = time();
    }
    //$human_datetime = unix_to_human($time);
    //$human_datetime = date('d  M  , Y',$time);
    $human_datetime = date('d-m-y', $time);
    //$human_datetime = date('dS M , Y',$time);
    return $human_datetime;
}

function get_field_data($table, $condition = array(), $field_name) {

    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select($field_name);
    $ci->db->from($table);
    $ci->db->where($condition);
    $query = $ci->db->get();
    if ($query->num_rows() > 0) {
        $firstname = $query->row();
        return $firstname->$field_name;
    }
}

function get_field_payment($condition = array()) {

    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('payment_plan_title');
    $ci->db->from('user_payment');
    $ci->db->join('payment_plan', 'user_payment.user_payment_plan_id=payment_plan.payment_plan_id', 'left');
    $ci->db->where($condition);

    $ci->db->order_by('user_payment_id', 'desc');

    $query = $ci->db->get();
    if ($query->num_rows() > 0) {
        $firstname = $query->row();
        return $firstname->payment_plan_title;
    }
}

function get_count_data($table, $condition = array(), $field_name) {

    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select($field_name);
    $ci->db->from($table);
    $ci->db->where($condition);
    $query = $ci->db->get();
    return $query->num_rows();
}

function get_all($table, $condition = array(), $order_by_fieled = '', $order_by_type = "asc", $limit = 0, $row = 0) {
    $ci = & get_instance();
    $ci->load->database();

    if ($condition) {
        $ci->db->where($condition);
    }
    if ($order_by_fieled) {
        $ci->db->order_by($order_by_fieled, $order_by_type);
    }
    if ($limit) {
        $query = $ci->db->get($table, $limit, $row);
    } else {

        $query = $ci->db->get($table);
    }
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array();
    }
}

function display_select($table, $condition = array(), $order_by_fieled = '', $order_by_type = "desc", $select_name = '', $select_id = '', $select_value = '') {
    $ci = & get_instance();
    $ci->load->database();
    $return_value = '';
    $ci->db->from($table);
    if ($condition) {
        $ci->db->where($condition);
    }
    if ($order_by_fieled) {
        $ci->db->order_by($order_by_fieled, $order_by_type);
    }
    $query = $ci->db->get();
    if ($query->num_rows() > 0) {
        $results = $query->result_array();
        //print_r($results);
        foreach ($results as $res) {
            if ($res[$select_id] == $select_name) {

                $return_value.='<option selected value=' . $res[$select_id] . '>' . $res[$select_value] . '</option>';
            } else {
                $return_value.='<option  value=' . $res[$select_id] . '>' . $res[$select_value] . '</option>';
            }
        }
        return $return_value;
    } else {
        return $return_value;
    }
}

?>