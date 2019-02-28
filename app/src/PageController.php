<?php

  use SilverStripe\CMS\Controllers\ContentController;
  use SilverStripe\Control\Email\Email;
  use SilverStripe\Forms\Form;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\EmailField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\Forms\FormAction;
  use SilverStripe\Forms\RequiredFields;
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Dev\Debug;
  use Silverstripe\SiteConfig\SiteConfig;
  use SilverStripe\View\Requirements;
  use SilverStripe\Control\Director;

  use SilverStripe\Blog\Model\BlogCategory;
  use SilverStripe\Blog\Model\BlogPost;

  use Nydinum\Pages\FooterPage;
  use Nydinum\Pages\JobPage;
  use Nydinum\Pages\ContactUsPage;

  class PageController extends ContentController
  {
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * [
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * ];
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = ['ContactUsForm'];

    protected function init()
    {
      parent::init();
      // css
      Requirements::css('themes/greenstone/css/vendor.bundle.min.css');
      Requirements::combine_files('greenstone.min.css',
        [
          'themes/greenstone/css/style.css', 
          'themes/greenstone/css/responsive.css'
        ]
      );
      Requirements::process_combined_files();

      // javascript
      Requirements::javascript('themes/greenstone/javascript/vendor.bundle.min.js');
      Requirements::combine_files('gs.bundle.js',
        ['themes/greenstone/javascript/greenstone.js']
      );
      Requirements::process_combined_files();
      Requirements::set_force_js_to_bottom(true);
    }

    public function ContactUsForm() 
    { 
      $name = new TextField('Name');
      $name->setAttribute('placeholder', 'Name');

      $email = new EmailField('Email');
      $email->setAttribute('placeholder', 'Email');

      $message = new TextareaField('Message');
      $message->setAttribute('placeholder', 'Your message');

      $fields = new FieldList( 
        $name, 
        $email, 
        $message
      );
      $submit = new FormAction('submitContactUsForm', 'Submit');
      $submit->addExtraClass('cont-submit btn-contact');
      $actions = new FieldList($submit);
      $validators = new RequiredFields('Name', 'Email', 'Message');
      $form = new Form($this, 'ContactUsForm', $fields, $actions, $validators);
      $form->setFormMethod('POST', false);
      $form->setTemplate('ContactUsForm');
      return $form;
    }

    public function submitContactUsForm($data, $form) 
    { 
      $config = SiteConfig::current_site_config();
      $thanks = ContactUsPage::get()->first();

      $email = new Email(); 
      $email->setTo($config->EmailAddress); 
      $email->setFrom('admin@greenstonsolutions.co.nz'); 
      // $email->setFrom($data['Email']); 
      $email->setSubject("Contact Message from {$data["Name"]}"); 

      $messageBody = " 
        <p><strong>Name:</strong> {$data['Name']}</p> 
        <p><strong>Email:</strong> {$data['Email']}</p> 
        <p><strong>Message:</strong> {$data['Message']}</p> 
      "; 
      
      $email->setBody($messageBody); 
      $email->send();
      return [
        'Message' => $thanks,
        'Success' => true
      ];
    }
    
    public function LatestPosts()
    {
      return BlogPost::get()
        ->sort('"PublishDate" DESC')
        ->limit(3);
    }

    public function Categories()
    {
      return BlogCategory::get()
          ->sort('"Title" ASC')
          ->limit(5);
    }

    public function ThisYear() {
      return date('Y');
    }

    public function FooterPages() {
      return FooterPage::get();
    }

    public function ContactUsPage() {
      return ContactUsPage::get()->first();
    }

    public function HasActiveJobs() {
      return JobPage::get()->filter("IsActive", 1)->first();
    }
      
  }

