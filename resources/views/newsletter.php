<?php

use App\Models\Weblogblog;

$previous_week = strtotime("-1 week +1 day");
$start_week = strtotime("last sunday midnight", $previous_week);
$end_week = strtotime("next saturday", $start_week);
$start_week = date("Y-m-d", $start_week);
$end_week = date("Y-m-d", $end_week);
$test = (Weblogblog::whereBetween('created_at', [$start_week, $end_week])->get('title'));
echo (trim($test, '  [ ] { } : " Title '));