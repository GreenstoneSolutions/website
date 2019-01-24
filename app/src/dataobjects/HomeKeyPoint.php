<?php
  namespace Nydinum\Models;

  use Nydinum\Pages\HomePage;
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\ORM\FieldType\DBField;
  use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
  use SilverStripe\ORM\FieldType\DBText;
  use SilverStripe\ORM\FieldType\DBHTMLVarchar;
  use SilverStripe\Forms\FileField;
  use SilverStripe\Forms\DateField;
  use SilverStripe\Assets\File;
  use SilverStripe\AssetAdmin\Forms\UploadField;
  use SilverStripe\Forms\GridField\GridField;
  use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

  class HomeKeyPoint extends DataObject 
  { 
    private static $table_name = 'HomeKeyPoint';
    private static $db = [
      'Title' => 'Varchar',
      'ShortDescription' => 'HTMLText',
      'IconClass' => 'HTMLVarchar',
      'SortOrder' => 'Int'
    ];
    private static $has_one = [
      'HomePage' => HomePage::class
    ] ;
    private static $default_sort = 'SortOrder';
    private static $summary_fields = [
      'Title', 'ShortDescription'
    ];

    public function getCMSFields()
    {
      $fields = FieldList::create(
        TextField::create('IconClass', 'Icon class'),
        TextField::create('Title', 'Key point'),
        TextareaField::create('ShortDescription', 'Short description')
      );
      return $fields;
    }

    public function populateDefaults() 
    {
      $this->IconClass = '<span class="flaticon-strategical-planning"></span>';
      parent::populateDefaults();
    }
  }
