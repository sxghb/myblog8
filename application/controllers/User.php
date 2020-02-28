<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function reg()
	{
		$this->load->view('reg');
	}
    public function log()
    {
        $this->load->view('log');
    }
    public function logout()
    {
        $this->session->unset_userdata('user',null);
        redirect('user/log');
    }
    public function do_reg()
    {
        $email=$this->input->post('email');
        $username=$this->input->post('username');
        $pwd1=$this->input->post('pwd1');
        $pwd2=$this->input->post('pwd2');
        $sex=$this->input->post('sex');
        $prov=$this->input->post('prov');
        $city=$this->input->post('city');

        if($email==''){
            redirect('user/reg');
        }

        $this->load->model('user_model');
        $rows=$this->user_model->save_user($email,$username,$pwd1,$sex,$prov,$city);
        if($rows==1){
            redirect('user/log');
        }else{
            redirect('user/reg');
        }
        }
        public function check_email(){
	    $email=$this->input->get('email');
	    $this->load->model('user_model');
	    $row=$this->user_model->get_by_email($email);

	    if($row)
       {
            echo 'fail';
       }else
        {
            echo 'success';
        }
        }

        public function check_log()
        {
            $email=$this->input->post('email');
            $pwd=$this->input->post('pwd');
            $this->load->model('user_model');
            $user=$this->user_model->get_by_email_and_pwd($email,$pwd);
            //var_dump($user->username);//打印$user数据，发现里面是一条记录数据
            //die;//执行到此为止
            $this->session->set_userdata('user',$user);
            if($user)
            {
                //echo "登录成功";
                redirect('admin/index');
            }
            else
            {
             ?>   //echo "登录失败";
                <script> alert("用户名或密码错误！")  ;</script>
            <?php    redirect('user/log');
            }
        }
}
