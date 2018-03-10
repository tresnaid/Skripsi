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


$jumlah = countmax(5,9,7);
echo $jumlah;



 ?>