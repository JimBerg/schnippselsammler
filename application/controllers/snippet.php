<?php
class Snippet extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
	}
	
	
	/*------------------------------------------------------------*
	* default action - renders templates for listview
	*------------------------------------------------------------*/
	public function index( $view = 'listview' ) 
	{
		$this->load->model( 'snippetModel' );
		$data['table'] = $this->snippetModel->getLanguages();
		$data['activeTab'] = $view;
		 
		$this->template->write_view( 'header', 'header', $data );
		$this->template->write_view( 'view', $view, $data );
		$this->template->write_view( 'preview', 'preview', $data );
		$this->template->render();
	}
	
	
	/*------------------------------------------------------------*
	* save updatet snippet
	*------------------------------------------------------------*/
	public function saveData( )
	{
		$this->load->model( 'snippetModel' );
		$id = $this->input->post( 'snippetId' );
		die(var_dump($_POST));
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

	public function create()
	{
		$this->load->model( 'snippetModel' );
	
		$data = array(
			'title' 	=> $this->input->post( 'title' ),
			'syntax' 	=> $this->input->post( 'syntax' ),
			'tags' 		=> $this->input->post( 'tags' ),
			'content' 	=> $this->input->post( 'newSnippet' ),
		);

		$this->snippetModel->insertSnippet( $data );
		redirect( 'snippet' );
	}

}