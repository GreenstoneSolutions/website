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

  class HomeService extends DataObject 
  { 
    private static $table_name = 'HomeService';
    private static $db = [
      'Title' => 'Text',
      'ShortDescription' => 'HTMLText',
      'FullDescription' => 'HTMLText',
      'Link' => 'Varchar',
      'SortOrder' => 'Int'
    ];
    private static $has_one = [
      'BackgroundImage' => Image::class,
      'HomePage' => HomePage::class
    ] ;
    private static $default_sort = 'SortOrder';
    private static $summary_fields = [
      'Title'
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
          TextField::create('Title', 'Service title'),
          TextareaField::create('ShortDescription', 'Short description (appears on Home page)'),
          HTMLEditorField::create('FullDescription', 'Full description (appears on Services page)'),
          // TextField::create('Link', 'Button link'),
          $uploader = UploadField::create('BackgroundImage', 'Background image')
        );

        $uploader->setFolderName('service-photos');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);

        return $fields;
    }
  }
