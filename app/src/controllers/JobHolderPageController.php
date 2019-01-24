<?php
  namespace Nydinum\Controllers;
  use PageController;

  use Nydinum\Pages\JobPage;
  
  class JobHolderPageController extends PageController 
  { 
    public function init() {
      parent::init();
    }
    public function ActiveJobs() {
      return JobPage::get();
    }
  }
