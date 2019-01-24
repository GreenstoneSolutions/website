<?php
  namespace Nydinum\Pages;
  use Page;
  
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\CheckboxField;
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


  class JobPage extends Page 
  {
    private static $table_name = 'GsJobPage';
    private static $db = array(
      'IsActive' => 'Boolean',
      'ShortDescription' => 'HTMLText',
    );
    public function canAddChildren($member = null)
    {
      return false;
    }
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new CheckboxField('IsActive','Is Job Active?'), 'Content');
        $fields->addFieldToTab('Root.Main', new TextareaField('ShortDescription','Short description, appears on Jobs page'), 'Content');
        return $fields;
    }
  }
