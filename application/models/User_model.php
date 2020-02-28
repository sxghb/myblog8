<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

//    public function get_by_uname_and_pwd ($uname,$pwd)//方法名如是多个单词，单词间用_分隔
//
//    {
//        return $this->db->get_where('t_user',array(
//            'name'=>$uname,'password'=>$pwd
//        ))->row();
//    }
    public function save_user($email,$username,$pwd1,$sex,$prov,$city)
    {
        $this->db->insert('t_user',array(
            'email'=>$email,
            'username'=>$username,
            'password'=>$pwd1,
            'sex'=>$sex,
            'province'=>$prov,
            'city'=>$city
        ));
        return $this->db->affected_rows();//返回当前操作影响的行数
    }
    public function get_by_email($email){
        return $this->db->get_where('t_user',array('email'=>$email))->row();
    }

    public function get_by_email_and_pwd($email,$pwd){
        return $this->db->get_where('t_user',array('email'=>$email,'password'=>$pwd))->row();
    }


}

