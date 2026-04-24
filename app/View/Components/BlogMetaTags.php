<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class BlogMetaTags extends Component
{
    public $post;

    /**
     * Create a new component instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.blog-meta-tags');
    }
}
