class BackendJobeetJobForm extends JobeetJobForm
{
  public function configure()
  {
    parent::configure();
  }
 
  protected function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'],
      $this['token']
    );
  }
}