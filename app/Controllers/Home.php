<?php

namespace App\Controllers;

use AuthorServices;
use BookServices;
use CodeIgniter\API\ResponseTrait;
use PublisherServices;

class Home extends BaseController
{
    use ResponseTrait;

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
//        $authorServices = new AuthorServices();
//        $this->create("User1", "Lastname");
//        $authorModel = new AuthorModel();

//        Create Author
//        $addAuthor = $this->authorServices->create("Hello", "World");

//        Create Publisher
//        $addPublisher = $this->publisherServices->create("Test");

//        Create Book
//        $this->bookServices->create("Book1", "isbn1", $addPublisher->getId(), $addAuthor->getId());

//        $data = $this->bookServices->getAll();

//        dd($data);

        return $this->twig->render('test');
    }

    public function getAll()
    {
        $data = $this->bookServices->getAll();

        $json = [
            "status" => true,
            "data" => $data->toArray(),
        ];

//        dd($data);

//        dd($this->response->setJSON($json));

//        dd($this->response->setJSON($data));
//        return $this->respond($json, 200);
        return $this->response->setJSON($json);
    }
}
