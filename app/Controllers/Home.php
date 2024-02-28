<?php

namespace App\Controllers;

use AuthorServices;
use BookServices;
use CodeIgniter\Validation\Validation;
use Config\Services;
use PublisherServices;

class Home extends BaseController
{
    private $authorServices;
    private $bookServices;
    private $publisherServices;

    public function __construct()
    {
        $this->authorServices = new AuthorServices();
        $this->bookServices = new BookServices();
        $this->publisherServices = new PublisherServices();
    }

    public function index(): string
    {
        return $this->twig->render('home');
    }

    public function getAll()
    {
        try {
//            Get All Book
            $data = $this->bookServices->getAll();

//            Check if data empty
            if (!$data->toArray()) {
                $response = [
                    'status' => false,
                    'data' => 'Data is empty.'
                ];

                return $this->response->setJSON($response);
            }

            $response = [
                'status' => true,
                'data' => $data->toArray()
            ];

//            Return Response
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'data' => $e->getMessage()
            ];

//            Return Error
            return $this->response->setJSON($response);
        }
    }

    public function doAdd()
    {
        try {
//            Init request
            $title = $this->request->getPost('Title');
            $isbn = $this->request->getPost('ISBN');

//            Use method validation
            $validation = Services::validation();

            $validation->setRules([
                'Title' => 'required',
                'ISBN' => 'required'
            ]);

            $data = [
                'Title' => $title,
                'ISBN' => $isbn,
            ];

            if (!$validation->run($data)) {
                $response = [
                    'status' => false,
                    'data' => $validation->getErrors(),
                ];

                return $this->response->setJSON($response);
            }

//            Insert Book
            $addProccess = $this->bookServices->create($title, $isbn, 6, 6);

            $response = [
                'status' => true,
                'data' => $addProccess->toArray(),
            ];

            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'data' => $e->getMessage()
            ];

//            Return Error
            return $this->response->setJSON($response);
        }
    }

    public function doUpdate()
    {
        try {
            $id = $this->request->getPost('id');
            $title = $this->request->getPost('Title');
            $isbn = $this->request->getPost('ISBN');

            $validation = Services::validation();

            $validation->setRules([
                'id' => 'required',
                'Title' => 'required',
                'ISBN' => 'required'
            ]);

            $data = [
                'id' => $id,
                'Title' => $title,
                'ISBN' => $isbn
            ];

            if (!$validation->run($data)) {
                $response = [
                    'status' => false,
                    'data' => $validation->getErrors(),
                ];

                return $this->response->setJSON($response);
            }
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'data' => $e->getMessage()
            ];

            return $this->response->setJSON($response);
        }
    }

    public function doDelete()
    {
        try {
            $id = $this->request->getPost('id');

//            if (!$this->request->is('delete')) {
//                $response = [
//                    'status' => true,
//                    'data' => "Wrong request"
//                ];
//
//                return $this->response->setJSON($response);
//            }

            $validation = Services::validation();

            $validation->setRule('id', 'id', 'required');

            $data = [
                'id' => $id,
            ];

            if (!$validation->run($data)) {
                $response = [
                    'status' => false,
                    'data' => $validation->getErrors(),
                ];

                return $this->response->setJSON($response);
            }

            $delete = $this->bookServices->delete($id);

            $response = [
                'status' => true,
                'data' => $delete
            ];

            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'data' => $e->getMessage()
            ];

            return $this->response->setJSON($response);
        }
    }
}
