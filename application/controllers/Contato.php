<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {
	
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library( array('form_validation', 'session'));

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required|exact_length[14]', array('exact_length' => 'O campo %s não está completo.'));
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('contato_view', array('error' => ''));
		}
		else
		{
			define('PUBPATH',str_replace(SELF,'',FCPATH));
			$config['upload_path'] = PUBPATH.'uploads';
			$config['allowed_types'] = 'pdf|doc|docx|odt|txt';
			$config['max_size'] = 500;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('arquivo'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('contato_view', $error);
			}
			else
			{
				$this->load->model('Contato_model');
				$this->Contato_model->inserir_contato();
				$this->enviar_email();
			}
		}
	}

	public function enviar_email()
	{
		$this->load->library('email');
		$this->load->config('email');		

		$this->email->from($this->config->item('smtp_user'));        
		$this->email->to($this->config->item('email_to'));        
		$this->email->subject($this->config->item('email_subject'));
		$this->email->message('<p><strong>Nome:</strong> '.$_POST['nome'].'</p>
							   <p><strong>Email:</strong> '.$_POST['email'].'</p>
							   <p><strong>Telefone:</strong> '.$_POST['telefone'].'</p>
							   <p><strong>Mensagem:</strong> '.$_POST['mensagem'].'</p>');
		$this->email->attach($this->upload->data('full_path'));
		
		if($this->email->send()){
			$this->session->set_flashdata('alert', '
				<div class="alert alert-success" role="alert">
					Adicionado com sucesso!
				</div>');
			redirect('/');
		}
		else{
			echo $this->email->print_debugger();
		}
	}
}
