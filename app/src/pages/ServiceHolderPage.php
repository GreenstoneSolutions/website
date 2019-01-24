<?php
  namespace Nydinum\Pages;
  use Page;
  use HomePage;
  
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\ORM\FieldType\DBField;
  use SilverStripe\ORM\FieldType\DBText;
  use SilverStripe\ORM\FieldType\DBHTMLVarchar;
  use SilverStripe\Forms\FileField;
  use SilverStripe\Forms\DateField;
  use SilverStripe\Assets\File;
  use SilverStripe\AssetAdmin\Forms\UploadField;
  use SilverStripe\Forms\GridField\GridField;
  use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

  use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

  use Nydinum\Models\HomeSlider;
  use Nydinum\Models\HomeService;


  class ServiceHolderPage extends Page 
  {
    private static $table_name = 'GsServiceHolderPage';
    public function canAddChildren($member = null)
    {
      return false;
    }
    public function getCMSFields()
    {
      $fields = parent::getCMSFields();
      return $fields;
    }

    public function AllServices() {
      return HomeService::get()->sort('SortOrder', 'ASC');
    }
  }