<?php

use Ormodel\Book;
use Ormodel\BookQuery;
class BookServices
{
    public function create($title, $isbn, $publisherId, $authorId)
    {
        $q = new Book();
        $q->setTitle($title);
        $q->setISBN($isbn);
        $q->setPublisherId($publisherId);
        $q->setAuthorId($authorId);
        $q->save();

    }

    public function findId($id)
    {
        $q = new BookQuery();
        return $q->findPk($id);
    }

    public function getAll()
    {
        $q = BookQuery::create()->joinWith("Book.Author")->joinWithPublisher();
        return $q;
    }
}