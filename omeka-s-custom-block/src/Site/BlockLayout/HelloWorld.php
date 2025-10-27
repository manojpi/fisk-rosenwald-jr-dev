<?php
namespace MyBlockMg\Site\BlockLayout;

use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;
use Laminas\View\Renderer\PhpRenderer;


class HelloWorld extends AbstractBlockLayout
{

    public function getLabel()
    {
        return 'Hello World Block Label';
    }

    public function form(
        PhpRenderer $view,
        SiteRepresentation $site,
        SitePageRepresentation $page = null,
        SitePageBlockRepresentation $block = null
    ) {
        $data = $block ? $block->data() : [];

        $defaults = [
            'heading' => 'Hello World',
            'message' => 'This is Manoj"s custom blocks',
        ];

        $data = array_merge($defaults, $data);

        return $view->partial('common/block-layout/hello-world-form', [
            'data' => $data,
        ]);
    }

    public function render(PhpRenderer $view, SitePageBlockRepresentation $block = null)
    {
        $data = $block->data();

        return $view->partial('common/block-layout/hello-world', [
            'heading' => $data['heading'] ?? 'Hello World!',
            'message' => $data['message'] ?? 'Manoj',
        ]);
    }

}
?>