<?php

namespace App\Controllers;
use App\Models\BookModel;

class Book extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session();
		$data['session']=$session;

        $model =new BookModel();
		$booksArray = $model->getRecords();
        $data['books'] = $booksArray;
		//$this->load->helper('url');
		return view("books/list",$data);
	}

	public function create()
	{
		$session = \Config\Services::session();
		helper('form');
		$data = [];

        if($this->request->getMethod() == "post")
		{
		
			$input = $this->validate([
				'name' => 'required',
				'author' => 'required'
			]);

			if($input == true)
			{
                $model = new BookModel();
				$model->save([
					'title'=>$this->request->getPost('name'),
					'author'=>$this->request->getPost('author')
				]);
				$session->setFlashdata('success','recode added successfuly');
				return redirect()->to('index');
				//redirect(base_url().'index.php/book/index');
			}
			else
			{
				$data['validation'] = $this->validator;

			}
		}

		return view("books/create",$data);
	}

	public function edit($id)
	{ 
		$session = \Config\Services::session();
		helper('form');
		$model =new BookModel();
		$book = $model->getRow($id);
		$data = [];
        $data['book'] = $book;
        if($this->request->getMethod() == "post")
		{
		
			$input = $this->validate([
				'name' => 'required',
				'author' => 'required'
			]);

			if($input == true)
			{
				
                $model = new BookModel();
				$model->update($id,[
					'title'=>$this->request->getPost('name'),
					'author'=>$this->request->getPost('author')
				]);
				$session->setFlashdata('success','recode added successfuly');
				return redirect()->to('index');
				//redirect(base_url().'index.php/book/index');
			}
			else
			{
				$data['validation'] = $this->validator;

			}
		}

		return view("books/edit",$data);
	}

	public function delete($id)
	{
		$session = \Config\Services::session();
		
		$model =new BookModel();
		$book = $model->getRow($id);

        if(empty ($book))
		{
			$session->setFlashdata('error','Record not found');
			return redirect()->to('book');
		}
		$model=new BookModel();
		$model->delete($id);

		$session->setFlashdata('success','Record deleted');
		return redirect()->to('book');
	}
}