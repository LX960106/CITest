<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->helper(array('url','form','date'));
		$this->load->database();		
	}
	public function login()
	{
		$sql = "select * from students";
		$res = $this->db->query($sql);
		$arr = $res->result_array();
		echo json_encode($arr);
		
	}
	public function photoUpload(){
		var_dump($this->session->userdata("file")) ;
		$this->load->view("My/photoUpload");

	}
	public function lixian(){
		$upFilePath = "D:/lixian/".time().strtolower(strstr($_FILES['img']['name'], "."));
		$ok=@move_uploaded_file($_FILES['img']['tmp_name'],$upFilePath);
		$this->session->set_userdata("file",$_FILES['img']);
		if($ok === FALSE){
			$arr = array("index"=>"失败");
			echo json_encode($arr);
			}else{
			$arr = array("index"=>"成功");
			echo json_encode($arr);
			}
	}
	public function dividePage(){
		//装载类文件
		$this->load->library('pagination');
		//每一页显示的数据条数的变量
		$page_size=2;

		$this->load->helper('url');//分页一定要用它！！！！！！
		$config['base_url']=site_url("My/dividePage");
		$config['uri_segment']=3;//分页的偏移量查询在那一段上面

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		//已经废弃
		//$config['anchor_class']="class='ajax_fPage'";//借鉴第一篇文章的大神，这里为每个a标签加样式
		 $config['attributes'] = array('class' => 'myclass');//给所有<a>标签加上class

		//每一页显示的数据条数
		$config['per_page']=$page_size;
		$config['first_link']= '首页';
		$config['next_link']= '下一页';
		$config['prev_link']= '上一页';
		$config['last_link']= '末页';



		//一共有多少条数据
		$sql = "select * from newsInforms";
        $res = $this->db->query($sql);
		$rows = $res->num_rows() ;
		$config['total_rows']=$rows;

		//初始化 ，传入配置？？？？
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		//传入的数据
		$offset=intval($this->uri->segment(3));//用intval使空格转0，显示出来0
		$this->load->model("MyModel");
		$data["arr"] = $this->MyModel->getData($offset,$page_size);

		$this->load->view("My/dividePage",$data);

	}
}
