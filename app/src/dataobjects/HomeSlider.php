<?php
  namespace Nydinum\Models;

  use Nydinum\Pages\HomePage;
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

  class HomeSlider extends DataObject 
  { 
    private static $table_name = 'HomeSlider';
    private static $db = [
      'FirstTitle' => 'Varchar',
      'SecondTitle' => 'Varchar',
      'ShortDescription' => 'HTMLVarchar',
      'SortOrder' => 'Int'
    ];
    private static $has_one = [
      'BackgroundImage' => Image::class,
      'HomePage' => HomePage::class
    ] ;
    
    private static $default_sort = 'SortOrder';
    private static $summary_fields = [
      'FirstTitle',
      'SecondTitle',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('FirstTitle', 'First line title'),
            TextField::create('SecondTitle', 'Second line text'),
            TextareaField::create('ShortDescription', 'Short description' ),
            $uploader = UploadField::create('BackgroundImage')
        );

        $uploader->setFolderName('slider-photos');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);

        return $fields;
    }

    public function getTitle() {
      return $this->FirstTitle;
    }

    public function ImageLink() {
      return $this->BackgroundImage->getLink();
    }
  }
