<?php

namespace Medusa\Queue;

use Medusa\Stack\PersistentStack;

class EmptyQueue implements \IteratorAggregate, Queue
{
    public function isEmpty()
    {
        return true;
    }

    public function peek()
    {
        throw new \RuntimeException("Can't peek empty queue");
    }

    public function enqueue($value)
    {
        return new PersistentQueue(PersistentStack::createEmpty()->push($value), PersistentStack::createEmpty(), 1);
    }

    public function dequeue()
    {
        throw new \RuntimeException("Can't dequeue empty queue");
    }

    public function count()
    {
        return 0;
    }

    public function getIterator()
    {
        return new \EmptyIterator;
    }
}
