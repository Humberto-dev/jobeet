<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class jobActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->jobeet_jobs = Doctrine_Core::getTable('JobeetJob')
      ->createQuery('a')
      ->execute();*/
      // $q= Doctrine_Query::create()
      // ->from('JobeetJob j')
      // // ->where('j.created_at > ?', date('Y-m-h:i:s', time() - 86940 * 30));

      // //cambiamos la sentencia de where para que traiga las publicaciones vigentes
      // ->where('j.expires_at > ?', date('Y-m-d h:i:s', time()));
     
      // $this->jobeet_jobs = $q->execute();

      // $q = Doctrine_Query::create()
      // ->from('JobeetJob j')
      // ->where('j.expires_at > ?', date('Y-m-d h:i:s', time()));
   
      // $this->jobeet_jobs = $q->execute();

      // $this->jobeet_jobs = Doctrine_Core::getTable('JobeetJob')->getActiveJobs();
      $this->categories = Doctrine_Core::getTable('JobeetCategory')->getWithJobs();

  }

  public function executeShow(sfWebRequest $request)
  {
    //$this->job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id')));
    //se ha sustituido la linea de codigo anterior por la contigua ya que se obtiene
    //el objeto a partir de la ruta en routin.yml
    $this->job = $this->getRoute()->getObject();
    /*se puede simplificar le codigo  ya que en este caso el metodo getReuter() lanza las exepciones de ruta */
    //$this->forward404Unless($this->job);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetJobForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetJobForm($jobeet_job);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetJobForm($jobeet_job);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $jobeet_job->delete();

    $this->redirect('job/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $jobeet_job = $form->save();

      $this->redirect('job/edit?id='.$jobeet_job->getId());
    }
  }
}
