<?php 

class Contato_model extends CI_Model {

    function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public $nome;
    public $email;
    public $telefone;
    public $mensagem;
    public $arquivo_cam;
    public $ip;

    public function inserir_contato()
    {
        $this->nome = $_POST['nome']; 
        $this->email = $_POST['email'];
        $this->telefone = $_POST['telefone'];
        $this->mensagem = $_POST['mensagem'];
        $this->arquivo_cam = $this->upload->data('full_path');
        $this->ip = $this->input->ip_address();
        
        $this->db->insert('contatos', $this);
    }
}