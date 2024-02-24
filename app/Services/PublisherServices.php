<?php

use Ormodel\Publisher;
use Ormodel\PublisherQuery;

class PublisherServices
{
    public function create($name)
    {
        $q = new Publisher();
        $q->setName($name);
        $q->save();
        return $q;
    }

    public function findId($id)
    {
        $q = new PublisherQuery();
        return $q->findPk($id);
    }

    public function getAll()
    {
        $q = new PublisherQuery();
        return $q->find();
    }
}