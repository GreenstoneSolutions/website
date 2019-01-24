<?php

namespace SilverStripe\Blog\Model;

use PageController;

class BlogPostController extends PageController
{
  public function FeaturedPosts()
  {
    return BlogPost::get()
    ->sort('"PublishDate" DESC')
    ->limit(5);
  }

  public function AllCategories()
  {
    return BlogCategory::get();
  }

  public function MyCategories()
  {
    return $this->owner->Categories();
  }
}
