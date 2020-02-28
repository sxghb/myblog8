<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_index');
	}
    public function blog_type()
    {
        $user=$this->session->userdata('user');
        $this->load->model('blog_model');
        $results=$this->blog_model->get_by_userid($user->user_id);
        //echo $user->user_id;
        //var_dump($results);
        //die;
        $this->load->view('blog_type',array('types'=>$results));
    }
    public function add_type()
    {
        $type_name=$this->input->post('type_name');
        $user=$this->session->userdata('user');
        $user_id=$user->user_id;
        $this->load->model('blog_model');
        $row=$this->blog_model->save_type($type_name,$user_id);
        if($row>0)
        {
            //echo "ok";
            redirect('admin/blog_type');
        }else
            {echo "添加失败！";}
    }
    public function delete_type()
    {
        $type_id=$this->input->get('type_id');
        $this->load->model('blog_model');
        $row=$this->blog_model->delete_type($type_id);
        if($row>0){
            redirect('admin/blog_type');
        }else
        {
            echo "删除类型失败";
        }

    }
    public function new_blog()
    {
        $user=$this->session->userdata('user');
        $user_id=$user->user_id;

        $this->load->model('blog_model');
        $result=$this->blog_model->get_by_userid($user_id);

        $this->load->view('new_blog',array('types'=>$result));
    }

    public function post_blog()
    {
        $title=$this->input->post('title');
        $content=$this->input->post('content');
        $type_id=$this->input->post('type_id');

        $user=$this->session->userdata('user');
        $user_id=$user->user_id;

        $this->load->model('blog_model');
        $row=$this->blog_model->save_blog($title,$content,$type_id,$user_id);
        if($row>0){
            //echo "发表文章成功";
            redirect('admin/blogs');
        }else
        {
            echo "发表文章失败";
        }
    }

    public function blogs(){
	    $user=$this->session->userdata('user');
        $this->load->model('blog_model');
        $result=$this->blog_model->get_blogs_by_userid($user->user_id);
        //$num_rows=$result->num_rows();//得到返回记录的条数
        $num_rows=0;
        foreach ($result as $res)
        {
            $num_rows+=1;//得到返回记录的总条数
        }
        $this->load->view('blogs',array('blogs'=>$result,'num_rows'=>$num_rows));
    }

    public function delete_blog(){
        $ids=$this->input->get('ids');
	    $this->load->model('blog_model');
	    $row=$this->blog_model->delete_blog($ids) ;
	    if($row>0){
	        redirect('admin/blogs');
        }else{
	        echo "删除失败";
        }

    }

}
