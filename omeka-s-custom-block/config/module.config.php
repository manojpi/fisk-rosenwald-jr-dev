<?php
namespace MyBlockMg;

return [
    "block_layouts" => [
        "invokables" => [
            "helloWorld" => Site\BlockLayout\HelloWorld::class,
            ],
        ],

        "view_manager" => [
            "template_path_stack" => [
                __DIR__ . "/../view",
            ]
        ],
];
?>