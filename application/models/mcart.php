<?php

class Mcart extends CI_Model{
    
    public $rules = array(
        array(
            'field' => 'ten',
            'label' => 'Tên khách hàng',
            'rules' => 'required'
        ),
        
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        
        array(
            'field' => 'dt',
            'label' => 'Số điện thoại',
            'rules' => 'required|numeric|max_length[11]'
        ),
        
        array(
            'field' => 'dc',
            'label' => 'Địa chỉ',
            'rules' => 'required'
        )
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('cart');
        $this->load->library('session');
    }
    
    public function listCart(){
        $cart = $this->cart->contents();
        return $cart;
    }
    
    public function totalPrice(){
        $total = $this->cart->total();
        return $total;
    }
    
    public function insetCart($data){
        $this->cart->insert($data);
    }
    
    public function updateCart($data){
        $this->cart->update($data); 

    }
       
    public function deleteCart(){
        $this->cart->destroy();
    }

      /*----------  Lay  theo sản phẩm  -------------*/
   // public function OrderPro($id_sp){
        //$query = $this->db->get_where('blsanpham', array('id_sp'=>$id_sp));
        //$data = $query->result_array();
       // return $data;
    //}

    public function get_a_record2_customer(){
        $query = $this->db->get_where('khachhang');        
        $data = $query->row_array();
        return $data;
    }
    
    /*----------  Thêm  vào CSDL theo sản phẩm  -------------*/
    public function addCus($data = array()){
        $this->db->insert('khachhang', $data);
    }

    public function addOrder($data = array()){
        $this->db->insert('donhang', $data);
    }
                          
    
}