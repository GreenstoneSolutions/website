<?php
  namespace Nydinum\Pages;
  use Page;
  
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\ORM\FieldType\DBField;
  use SilverStripe\ORM\FieldType\DBText;
  use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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
  use Nydinum\Models\CustomerStory;

  class CustomerStoriesPage extends Page 
  { 
    private static $table_name = 'GsCustomerStoriesHolderPage';

    private static $has_many = [
      'CustomerStories' => CustomerStory::class
    ];
  
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new HTMLEditorField('Content', 'Page heading and short description'));

        // Customer story conf
        $storyConf = GridFieldConfig_RecordEditor::create(10);
		    $storyConf->addComponent(new GridFieldSortableRows('SortOrder'));

        $fields->addFieldToTab('Root.CustomerStories', new GridField(
          'CustomerStories',
          'Customer stories on this page',
          $this->CustomerStories(),
          $storyConf
        ));
  
        return $fields;
    }
  }
