<?php

use Ormodel\Author;
use Ormodel\AuthorQuery;

class AuthorServices {
    public function create($firstName, $lastName)
    {
        $q = new Author();
        $q->setFirstName($firstName);
        $q->setLastName($lastName);
        $q->save();
        return $q;
    }

    public function findId($id)
    {
        $q = new AuthorQuery();
        return $q->findPk($id);
    }

    public function getAll()
    {
        $q = new AuthorQuery();
        return $q->find();
    }
}