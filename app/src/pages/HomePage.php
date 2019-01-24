<?php
  // namespace Nydinum\Pages;
  // use Page;
  // class HomePage extends Page
  // {
  //   private static $db = [];

  //   private static $has_one = [];
  //   private static $has_many = [
  //     'Slider' => HomeSlider::class,
  //     'Services' => HomeService::class
  //     // 'Tags'       => BlogTag::class,
  //     // 'Authors'    => Member::class
  //   ];
  // }

  namespace Nydinum\Pages;
  use Page;
  
  use SilverStripe\ORM\DataObject;
  use SilverStripe\Assets\Image;
  use SilverStripe\Forms\FieldList;
  use SilverStripe\Forms\LiteralField;
  use SilverStripe\Forms\TextField;
  use SilverStripe\Forms\TextareaField;
  use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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
  use SilverStripe\Blog\Model\Blog;
  use SilverStripe\Blog\Model\BlogPost;

  use Nydinum\Models\HomeSlider;
  use Nydinum\Models\HomeKeyPoint;
  use Nydinum\Models\HomeService;
  use Nydinum\Models\HomeTestimonial;
  use Nydinum\Models\HomeSpecialisation;


  class HomePage extends Page 
  { 
    private static $table_name = 'GsHomePage';
    private static $db = [
      'ServicesHeadingText' => 'HTMLText',
      'AboutContent' => 'HTMLText',
      'TestimonialHeadingText' => 'HTMLText',
      'SpecialisationsHeadingText' => 'HTMLText',
      'KeyPointsHeadingText' => 'HTMLText',
      'NewsBlogHeadingText' => 'HTMLText'
    ];

    private static $has_one = [
      'TestimonialBackgroundImage' => Image::class,
      'SpecialisationBackgroundImage' => Image::class
    ];
    
    // private static $has_many = array(
    //   "Sliders" => HomeSlider::class,
    //   "Services" => HomeService::class
    // );
    private static $has_many = [
      'HomeSliders' => HomeSlider::class,
      'HomeKeyPoints' => HomeKeyPoint::class,
      'HomeServices' => HomeService::class,
      'HomeSpecialisations' => HomeSpecialisation::class,
      'HomeTestimonials' => HomeTestimonial::class,
    ];
    // private static $owns = [
    //   'Slider', 'Service'
    // ]; 

    public function canAddChildren($member = null)
    {
      return false;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main', 'Content');

        // Carousels
        $carouselConf = GridFieldConfig_RecordEditor::create(10);
		    $carouselConf->addComponent(new GridFieldSortableRows('SortOrder'));

        $fields->addFieldToTab('Root.Carousel', new GridField(
          'Carousel',
          'Carousels on this page',
          $this->HomeSliders(),
          $carouselConf
        ));

        // Key points
        $keyPointsConf = GridFieldConfig_RecordEditor::create(10);
		    $keyPointsConf->addComponent(new GridFieldSortableRows('SortOrder'));

        $fields->addFieldToTab('Root.KeyPoints', new GridField(
          'KeyPoint',
          'Keypoints on this page',
          $this->HomeKeyPoints(),
          $keyPointsConf
        ));
        $fields->addFieldToTab('Root.KeyPoints', new LiteralField ('KeyPointHeadingMessage', '<h2>KeyPoints meta data</h2>' ));
        $fields->addFieldToTab('Root.KeyPoints', new HTMLEditorField('KeyPointsHeadingText', 'Keypoint heading'));

        // Services
        $servicesConf = GridFieldConfig_RecordEditor::create(10);
		    $servicesConf->addComponent(new GridFieldSortableRows('SortOrder'));
        $fields->addFieldToTab('Root.Services', new GridField(
          'Services',
          'Services on this page',
          $this->HomeServices(),
          $servicesConf
        ));
        
        $fields->addFieldToTab('Root.Services', new LiteralField ('ServiceHeadingMessage', '<h2>Services meta data</h2>' ));
        $fields->addFieldToTab('Root.Services', new HTMLEditorField('ServicesHeadingText'));

        // Success Stories
        $specConf = GridFieldConfig_RecordEditor::create(10);
		    $specConf->addComponent(new GridFieldSortableRows('SortOrder'));
        $fields->addFieldToTab('Root.SuccessStories', new GridField(
          'Specialisations',
          'Success stories on this page',
          $this->HomeSpecialisations(),
          $specConf
        ));
        
        $fields->addFieldToTab('Root.SuccessStories', new LiteralField ('SpecialisationsHeadingMessage', '<h2>Success stories meta data</h2>' ));
        $fields->addFieldToTab('Root.SuccessStories', new HTMLEditorField('SpecialisationsHeadingText', 'Success stories heading text'));
        $specialisationUpload = UploadField::create('SpecialisationBackgroundImage', 'Background image (945x714)');
        $specialisationUpload->setFolderName('home-photos');
        $specialisationUpload->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);
        $fields->addFieldToTab('Root.SuccessStories', $specialisationUpload);
  
        // Testimonials
        $testimonialConf = GridFieldConfig_RecordEditor::create(10);
        $testimonialConf->addComponent(new GridFieldSortableRows('SortOrder'));
        $fields->addFieldToTab('Root.Testimonials', new GridField(
          'Testimonials',
          'Testimonials on this page',
          $this->HomeTestimonials(),
          $testimonialConf
        ));
        $fields->addFieldToTab('Root.Testimonials', new LiteralField ('TestimonialHeadingMessage', '<h2>Testimonials meta data</h2>' ));
        $fields->addFieldToTab('Root.Testimonials', new TextareaField('TestimonialHeadingText'));
        $testimonialUpload = UploadField::create('TestimonialBackgroundImage', 'Background image');
        $testimonialUpload->setFolderName('home-photos');
        $testimonialUpload->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);
        $fields->addFieldToTab('Root.Testimonials', $testimonialUpload);

        $fields->addFieldToTab('Root.NewsAndBlog', new HTMLEditorField('NewsBlogHeadingText'));
        return $fields;
    }

    public function AllServices() {
      return $this->HomeServices();
    }

    public function HomeBlogs() {
      return BlogPost::get()
            ->sort('"PublishDate" DESC')
            ->limit(5);
    }
  }
