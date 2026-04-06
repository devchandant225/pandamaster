<?php

namespace App\View\Components;

use App\Models\MetaTag;
use Illuminate\View\Component;

class MetaTags extends Component
{
    public $meta;
    public $title;
    public $description;
    public $keywords;
    public $image;
    public $page;

    /**
     * Create a new component instance.
     */
    public function __construct($page = null, $title = null, $description = null, $keywords = null, $image = null)
    {
        $this->page = $page ?: $this->detectPage();
        $this->meta = MetaTag::getByPageType($this->page);

        $this->title = $title ?: ($this->meta ? $this->meta->title : null);
        $this->description = $description ?: ($this->meta ? $this->meta->desc : null);
        $this->keywords = $keywords ?: ($this->meta ? $this->meta->keyword : null);
        $this->image = $image ?: ($this->meta ? $this->meta->image : null);
    }

    /**
     * Detect current page type based on route name or path
     */
    protected function detectPage()
    {
        if (request()->routeIs('home')) return 'home';
        if (request()->routeIs('about')) return 'about';
        if (request()->routeIs('contact')) return 'contact';
        if (request()->routeIs('investors')) return 'investors';
        if (request()->routeIs('tools')) return 'tools';
        if (request()->routeIs('city.show')) return 'city';
        if (request()->routeIs('property.show')) return 'property';
        if (request()->routeIs('blog.index')) return 'blog';
        if (request()->routeIs('blog.show')) return 'post';

        return 'home'; // Default
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.meta-tags');
    }
}
