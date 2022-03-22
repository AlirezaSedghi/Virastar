<?php

use Alirezasedghi\Virastar\Virastar;

require_once '../src/Virastar.php';

$start_time = microtime(true);

$virastar = new Virastar();

$test_file = fopen("sample_text.txt", "r") or die("Unable to open file!");
$text = fread($test_file, filesize("sample_text.txt"));
fclose($test_file);

try {
    $cleaned = $virastar->cleanup($text);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
<html dir="rtl" lang="fa-IR">
    <body>
        <p>
            <?php echo nl2br($cleaned ?? ''); ?>
        </p>
        <br>
        <strong>
            <?php

            $end_time = microtime(true);
            echo "پردازش فوق در مدت زمان " . number_format(($end_time-$start_time), 6) . " میلی ثانیه انجام شده‌است.";

            ?>
        </strong>
    </body>
</html>