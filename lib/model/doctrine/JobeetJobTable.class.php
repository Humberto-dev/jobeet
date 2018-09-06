<?php

/**
 * JobeetJobTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JobeetJobTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object JobeetJobTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('JobeetJob');
    }

    public function getActiveJobs(Doctrine_Query $q = null)
    {
      if (is_null($q))
      {
        $q = Doctrine_Query::create()
          ->from('JobeetJob j');
      }
     
      $q->andWhere('j.expires_at > ?', date('Y-m-d h:i:s', time()))
        ->addOrderBy('j.expires_at DESC');
     
         return $q->execute();
    }

    public function retrieveActiveJob(Doctrine_Query $q)
    {
     $q->andWhere('a.expires_at > ?', date('Y-m-d h:i:s', time()));
 
        return $q->fetchOne();
    }
}