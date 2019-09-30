<?php

namespace Grundmanis\Laracms\Modules\Content;

use Grundmanis\Laracms\Modules\Content\Models\LaracmsContent;

class Content
{
    /**
     * @var LaracmsContent
     */
    protected $content;

    /**
     * Content constructor.
     * @param LaracmsContent $content
     */
    public function __construct(LaracmsContent $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $slug
     * @param null $locale
     * @return string
     */
    public function get(string $slug, $locale = null)
    {
        $content = $this->content->firstOrCreate(['slug' => $slug]);

        if (!$content) {
            return $slug;
        }

        $locale = $locale ?? App::getLocale();

        if (!$content->translate($locale)) {
            return $slug;
        }

        return $content->translate($locale)->value;
    }
}