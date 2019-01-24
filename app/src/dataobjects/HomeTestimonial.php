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

  class HomeTestimonial extends DataObject 
  { 
    private static $table_name = 'HomeTestimonial';
    private static $db = [
      'ShortTitle' => 'Text',
      'Description' => 'HTMLText',
      'Author' => 'Varchar',
      'AuthorJobTitle' => 'Varchar',
      'SortOrder' => 'Int'
    ];
    private static $has_one = [
      'HomePage' => HomePage::class
    ] ;
    private static $default_sort = 'SortOrder';
    private static $summary_fields = [
      'ShortTitle',
      'Author',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
          TextField::create('ShortTitle', 'Testimonial title'),
          TextareaField::create('Description', 'Short description'),
          TextField::create('Author', 'Testimonial author'),
          TextField::create('AuthorJobTitle', 'Testimonial author job title')
        );
        return $fields;
    }

    public function getTitle() {
      return $this->ShortTitle;
    }
  }
