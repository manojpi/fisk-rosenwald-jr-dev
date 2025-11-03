<?php
namespace RosApiEnhance;

return [
    "block_layouts" => [
        "invokables" => [
            "apiFilter" => Site\BlockLayout\ApiFilterBlock::class,
            ],
        ],

        "view_manager" => [
            "template_path_stack" => [
                __DIR__ . "/../view",
            ]
        ],
];
?>