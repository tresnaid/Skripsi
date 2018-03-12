<?php 
function countmax($jumlah_measure, $jumlah_action, $jumlah_isneed)
        {
           $jumlah_max = $jumlah_measure;
           $nama = 'measure';
            if($jumlah_max<$jumlah_action) {
                $jumlah_max = $jumlah_action;
                $nama = 'action';
                if ($jumlah_max<$jumlah_isneed) {
                    $jumlah_max = $jumlah_isneed;
                    $nama = 'isneed';
                }
            }elseif ($jumlah_max<$jumlah_isneed) {
                $jumlah_max = $jumlah_isneed;
                    $nama = 'isneed';

            }

            return $nama;
        }


 ?>
<html>
<head>
    <title>Space Clicker</title>
</head>

<body>
    <script type="text/javascript">
    var clicks = 0;
    function onClick() {
        clicks += 1;
        document.getElementById("clicks").innerHTML = " ";
    };
    </script>
    <button type="button" onClick="onClick()">Click me</button>
    <p>Clicks: <a id="clicks">0</a></p>

</body></html>