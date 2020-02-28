<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

//    public function get_by_email_and_pwd($email,$pwd){
 //       return $this->db->get_where('t_user',array('email'=>$email,'password'=>$pwd))->row();
 //   }
    public function get_by_userid($user_id)
    {
       //echo $user_id;
       //echo "<br>";
        //return $results=$this->db->get_where('t_blog_type',array('user_id'=>$user_id))->result();
       //var_dump($results);
       //die;
        //select type.*, (select count(*) from t_blog where type_id=type.type_id) as blog_count
        //from t_blog_type type where type.user_id=4
        $this->db->select("type.*,(select count(*) from t_blog where type_id=type.type_id) as blog_count");
        $this->db->from("t_blog_type type");
        $this->db->where("type.user_id=$user_id");
        return $this->db->get()->result();
    }

    public function save_type($type_name,$user_id)
    {
        $this->db->insert('t_blog_type',array(
            'type_name'=>$type_name,
            'user_id'=>$user_id
                 ));
        return $this->db->affected_rows();//返回当前操作影响的行数
    }

    public function delete_type($type_id)
    {
        $this->db->delete('t_blog_type',array(
            'type_id'=>$type_id
        ));
        return $this->db->affected_rows();
    }
    public function save_blog($title,$content,$type_id,$user_id)
    {
        $this->db->insert('t_blog',array(
            'title'=>$title,
            'content'=>$content,
            'type_id'=>$type_id,
            'user_id'=>$user_id

        ));
        return $this->db->affected_rows();
    }

    public function get_blogs_by_userid($user_id){
        return $this->db->get_where('t_blog',array('user_id'=>$user_id))->result();
    }

    public function delete_blog($ids)
    {
        $this->db->query("delete from t_blog where blog_id in ($ids)");
        return $this->db->affected_rows();
    }

    public function get_by_blog_id($blog_id)
    {

        $this->db->select('blog.*,usr.username');
        $this->db->from('t_blog blog');
        $this->db->join('t_user usr','blog.user_id=usr.user_id');
        $this->db->where('blog_id',$blog_id);
        return $this->db->get()->row();
        //return $this->db->query("select blog.*,usr.username from t_blog blog,t_user usr where blog.user_id=usr.user_id and blog_id=$blog_id")->row();
        //经调试，上行语句和1-5行语句功能一样
    }


}

