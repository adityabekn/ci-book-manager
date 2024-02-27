<?php

namespace App\Controllers;

use AuthorServices;
use BookServices;
use CodeIgniter\API\ResponseTrait;
use PublisherServices;

class Home extends BaseController
{
    use ResponseTrait;

    protected $helpers = ['form'];

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
//        Create Author
//        $addAuthor = $this->authorServices->create("Hello", "World");

//        Create Publisher
//        $addPublisher = $this->publisherServices->create("Test");

//        Create Book
//        $this->bookServices->create("Book1", "isbn1", $addPublisher->getId(), $addAuthor->getId());

//        Get All Book
//        $data = $this->bookServices->getAll();

        return $this->twig->render('test');
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
            if (! $this->validation($title, $isbn)) {
                return $this->response->setJSON($this->validator->getErrors());
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

    }

    public function doDelete()
    {
//        $validation = \Config\Services::validation();
        try {
            if (!$this->request->is('delete')) {
                $response = [
                    'status' => true,
                    'data' => "Wrong request"
                ];

                return $this->response->setJSON($response);
            }

            $id = $this->request->getPost('id');

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

    public function validation($title, $isbn)
    {
        $rules = [
            'Title' => 'required',
            'ISBN' => 'required'
        ];

        $data = [
            'Title' => $title,
            'ISBN' => $isbn
        ];

        return $this->validateData($data, $rules);
    }
}
