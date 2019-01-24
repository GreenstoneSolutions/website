<?php
  namespace Nydinum\Models;

  use Nydinum\Pages\CustomerStoriesPage;
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

  class CustomerStory extends DataObject 
  { 
    private static $table_name = 'CustomerStory';
    private static $db = [
      'Title' => 'Varchar',
      'Description' => 'HTMLText',
      'SortOrder' => 'Int'
    ];
    private static $has_one = [
      'CustomerStoriesPage' => CustomerStoriesPage::class
    ] ;
    private static $default_sort = 'SortOrder';
    private static $summary_fields = [
      'Title'
    ];

    public function getCMSFields()
    {
      $fields = FieldList::create(
        TextField::create('Title', 'Heading'),
        HTMLEditorField::create('Description', 'Description')
      );
      return $fields;
    }
  }
