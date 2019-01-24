<?php
use Nydinum\Pages\CustomerStoriesPage;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\FieldType\DBText;
use SilverStripe\ORM\FieldType\DBHTMLVarchar;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\DateField;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class GreenstoneSiteConfig extends DataExtension 
{

    private static $db = [
      'EmailAddress' => 'Varchar',
      'Telephone' => 'Varchar',
      'LinkedInUrl' => 'Varchar',
      'TwitterUrl' => 'Varchar',
      'FacebookUrl' => 'Varchar',
      'YoutubeUrl' => 'Varchar',
      'Telephone' => 'Varchar',
      'GACode' => 'Varchar',
      'Address' => 'Text',
      'FooterContent' => 'HTMLText'
    ];

    public function updateCMSFields(FieldList $fields) 
    {
        $fields->addFieldsToTab("Root.Main",
          [
            new TextField("EmailAddress", "Email address"),
            new TextField("Telephone", "Telephone contact"),
            new TextField("GACode", "Google analytics code"),
            new TextareaField("FooterContent", "Footer Content"),
            new TextareaField("Address", "Address")
          ]
        );

        $fields->addFieldsToTab("Root.Social",
          [
            new TextField("LinkedInUrl", "Linkedin Url"),
            new TextField("TwitterUrl", "Twitter Url"),
            new TextField("FacebookUrl", "Facebook Url"),
            new TextField("YoutubeUrl", "Youtube Url")
          ]
        );
    }
}