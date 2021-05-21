<?php 
    include "koneksi.php";
    
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>NOTA TRANSAKSI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;

    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body onload="window.print()">


    <div class="invoice-box">
        <table class=""  cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <p class="text-bold" style="font-size: 30px;font-weight: 900;">THE RESTO</p>
                            </td>
                            
                            <td class="">
                                Tanggal : 
                               <?php
                               $tanggal=date('d M Y');
                               echo $tanggal;
                               ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td>
                                Jl. DI Panjaitan No. 128<br>
                                Karangreja, Purwokerto Kulon<br>
                                Kec.Purwokerto Selatan-Kab.Banyumas
                            </td>
                            
                            <td class="text-left float-right">
                                The Resto<br>
                                www.The-Resto.com<br>
                                theResto@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td colspan="4">
                    Kode Transaksi
                </td>
            
                <td>
                    <?php echo $_GET['kd'] ?>
                </td>
            </tr>
            
            <tr class="details">
                <td></td>
                <td></td>
            </tr>
            
            <tr class="heading text-center">
                <td>NO</td>
                <td>Nama Menu</td>
                <td>Harga</td>
                <td>Jumlah Beli</td>
                <td>Subtotal</td>
            </tr>
            <?php 
                $no=0;
                $a = mysqli_query($con,"SELECT * FROM transaksi WHERE no_nota = '$_GET[kd]'");
                while($r=mysqli_fetch_array($a)){
                $no++
            ?>
            <tr class="item text-center">
                <td><?php echo $no ?></td>
                <td><?php echo $r['nama'] ?></td>
                <td><?php echo $r['harga'] ?></td>
                <td><?php echo $r['qty'] ?></td>
                <td><?php echo $r['total'] ?></td>
            </tr>
            <?php } ?>

            <tr class="total" align="right">
                <td></td>
                <td></td>
                <td></td>
                <th class="float-right" align="right">Total :</th>
                <?php
                $a = mysqli_query($con, "SELECT SUM(total) as TOTAL FROM transaksi WHERE no_nota='$_GET[kd]'");
                $total = mysqli_fetch_array($a);
                ?>
                <th class="text-center"><?php echo $total['TOTAL'] ?></th>
            </tr>
            <tr class="total" align="right">
                <td></td>
                <td></td>
                <td></td>
                <th class="float-right" align="right">Bayar :</th>
                <?php
                $b = mysqli_query($con, "SELECT bayar FROM transaksi WHERE no_nota='$_GET[kd]'");
                $bayar = mysqli_fetch_array($b);
                ?>
                <th class="text-center"><?php echo $bayar['bayar'] ?></th>
            </tr>
            <tr class="total" align="right">
                <td></td>
                <td></td>
                <td></td>
                <th class="float-right" align="right">Kembalian :</th>
                <?php
                $c = mysqli_query($con, "SELECT kembalian FROM transaksi WHERE no_nota='$_GET[kd]'");
                $kembalian = mysqli_fetch_array($c);
                ?>
                <th class="text-center"><?php echo $kembalian['kembalian'] ?></th>
            </tr>
        </table>
        
    </div>
</body>
</html>
