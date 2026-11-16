<?php

$query = $args['query'];

if (function_exists('generate_pagination')) :
    generate_pagination($query->max_num_pages, get_query_var('paged'));
endif;
