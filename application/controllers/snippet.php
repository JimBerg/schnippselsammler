<?php
class Snippet extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
	}
	
	public function index() 
	{
		$this->load->model( 'snippetModel' );
		$data['table'] = $this->snippetModel->getLanguages();
		
		//$this->template->write_view( 'tableview', 'tableview', $data );
		//$this->template->write_view( 'create', 'create', $data );
		
		//$this->template->write( 'header', '<h1>Snippetmanager</h1>' );
		$this->template->write_view( 'header', 'header' );
		$this->template->write_view( 'listview', 'listview', $data );
		$this->template->write_view( 'preview', 'preview', $data );
		$this->template->render();
	}
	
	
	/**
	* save updatet snippet
	* @param int $id of element that has been edited
	*---------------------------------------------*/
	public function saveData( )
	{
		$this->load->model( 'snippetModel' );
		$id = $this->input->post( 'snippetId' );
		
		if ( !empty( $id ) ) {
			$data = array(
				'id' => $id,
				'content' => $this->input->post( 'snippet' )
			);
			$this->snippetModel->updateSnippet( $id, $data );
			redirect( 'snippet' );
		} else {
			return;
		}
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function noindex() /*index runs automatically */
	{
		$this->load->model( 'snippetModel' );
		//$data['snippets'] = $this->snippetModel->getSnippets( 'php' );
		//$this->load->view( 'index', $data );
		$this->load->view( 'create' );
return;
		$data['table'] = $this->snippetModel->getLanguages();
		$this->load->view( 'table', $data );
	}

	public function create()
	{
		/* load form helper */
		//$this->load->view( 'create' );
		$this->load->model( 'snippetModel' );
		
		$data = array(
			'title' 	=> $this->input->post( 'title' ),
			'syntax' 	=> $this->input->post( 'syntax' ),
			'content' 	=> $this->input->post( 'content' ),
		);

		$this->snippetModel->insertSnippet( $data );
	}


	
	
	
	
	
	
	
	
	
	

}