
<?php
//get 3 commands from user
function getPaginationButtons($total_items, $per_page, $current_page)
{
    // Implement getPaginationButtons function here
    $pages = [];
    $total_pages = ceil($total_items / $per_page);
//    prev page
    if ($current_page != 1) {
        $pages[] = [
            'text' => 'prev',
            'number' => $current_page - 1
        ];
    }
//    middle pages
    if ($current_page > 4) {
        $pages[] = [
            'text' => '1',
            'number' => 1
        ];
        $pages[] = [
            'text' => '...'
        ];
        for ($i = $current_page - 2; $i <= $current_page; $i++) {
            $pages[] = [
                'text' => (string)$i,
                'number' => $i
            ];
        }
    } else {
        for ($i = 1; $i <= $current_page; $i++) {
            $pages[] = [
                'text' => (string)$i,
                'number' => $i
            ];
        }
    }


    if ($current_page < $total_pages - 3) {
        for ($i = $current_page + 1; $i <= $current_page+2; $i++) {
            $pages[] = [
                'text' => (string)$i,
                'number' => $i
            ];
        }
        $pages[] = [
            'text' => '...'
        ];
        $pages[] = [
            'text' => (string)$total_pages,
            'number' => $total_pages
        ];
    } else {
        for ($i = $current_page+1; $i <= $total_pages; $i++) {
            $pages[] = [
                'text' => (string)$i,
                'number' => $i
            ];
        }
    }

//    next page
    if ($current_page != $total_pages) {
        $pages[] = [
            'text' => 'next',
            'number' => $current_page + 1
        ];
    }

    return $pages;
}
print_r(getPaginationButtons(7, 1, 2));

