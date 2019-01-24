<?php
  namespace Nydinum\Controllers;
  use PageController;
  use HomePage; 
  class ServiceHolderPageController extends PageController 
  {
    public function AllServices() {
      return HomePage::HomeServices();
    }
  }
