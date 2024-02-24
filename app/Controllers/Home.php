<?php

namespace App\Controllers;

use AuthorServices;
use BookServices;
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
//        $authorServices = new AuthorServices();
//        $this->create("User1", "Lastname");
//        $authorModel = new AuthorModel();

//        Create User
//        $addAuthor = $this->authorServices->create("Hello", "World");

//        Create Publisher
//        $addPublisher = $this->publisherServices->create("Test");

//        Create Book
//        $this->bookServices->create("Book1", "isbn1", $addPublisher->getId(), $addAuthor->getId());

        $data = $this->bookServices->getAll();

        dd($data);

        return $this->twig->render('test', ["data" => $data]);
    }
}
