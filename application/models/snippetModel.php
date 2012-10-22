<?php

class SnippetModel extends CI_Model {

	public function getSnippets( $syntax = null ) 
	{
		/*
			$this->db->select('id, title');
			$this->db->from('table');
			$this->db->where('id', 1);

			$this->db->select('user_id');
			$this->db->select_sum('user_id', 'total');
			$this->db->group_by('user_id'); 
			$this->db->order_by('total', 'desc'); 
			$this->db->get('tablename', 10);
		*/

		$dataCollection = array();
		if( $syntax != null ) {
			$this->db->where('syntax', $syntax );
		}
		$query = $this->db->get( 'snippets' );
		foreach ( $query->result() as $result ) {
		    $dataCollection[] = $result;
		}
		return $dataCollection;
	}

	public function insertSnippet( $data )
	{
		$this->db->insert( 'snippets', $data );
		return;
	}

	public function updateSnippet( $id, $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'snippets', $data );
		return;
	}

	public function getLanguages() 
	{
 		$this->db->select( 'syntax' );
 		$this->db->group_by( 'syntax' ); 
		$this->db->order_by( 'syntax', 'asc' ); //ok, it's ordered by default
		$query = $this->db->get( 'snippets' );
		
		foreach ( $query->result() as $result ) {
		    $table[ $result->syntax ] = $this->createTable( $result->syntax );
		}
		return $table;
	}

	private function createTable( $language ) 
	{
 		$this->db->where( 'syntax', $language ); 
		$query = $this->db->get( 'snippets' );

		foreach ( $query->result() as $result ) {
		    $dataCollection[] = $result;
		}
		return $dataCollection;
	}


 	public function deleteSnippet( $id ) 
	{
		$this->db->where( 'id', $id );
		$this->db->delete( 'snippets' ); 
	}








}