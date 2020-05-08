<?php

require __DIR__ . '/pagination.php';

$pagination_template = file_get_contents(__DIR__ . '/pagination.tpl');

echo renderPagination($pagination_template, 7, 1, 2, 'index.php?page=');
