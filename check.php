<?php
echo "<script>const cookieValue = document.cookie
.split('; ')
.find(row => row.startsWith('payment'))
.split('=')[1];

if(cookieValue==100)
    window.location.href='invoice.php';
else
window.location.href='checkout.php';
</script>";

?>

