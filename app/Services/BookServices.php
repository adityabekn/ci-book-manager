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
        return $q;
    }

    public function delete($id)
    {
        $q = BookQuery::create()->findPk($id);
        $q->delete();
        return $q->isDeleted();
    }

    public function findId($id)
    {
        $q = new BookQuery();
        return $q->findPk($id);
    }

    public function getAll()
    {
        $q = BookQuery::create()->joinWithAuthor()->joinWithPublisher()->find();
        return $q;
    }
}