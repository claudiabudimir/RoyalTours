<?php
ob_start();
include('header_admin.php');
?>

<div class="content center">

   <div class="text-center">
    <table id="customers" style="width:400px">
        <tr>
            <td>Comenzi rapide:</td>
        </tr>
        <tr>
            <td><a href="search_client.php">Cautare rezervări client</a></td>
        </tr>
        <tr>
            <td><a href="insert_product.php">Adăugare servicii și produse</a></td>
        </tr>
        <tr>
            <td><a href="insert_user_as_client.php">Adăugare client</a></td>
        </tr>
        <tr>
            <td><a href="insert_user_as_admin.php">Adăugare admin</a></td>
        </tr>
        <tr>
            <td><a href="display_reservations.php">Anulare rezervări</a></td>
        </tr>
        <tr>
            <td><a href="display_subscribed.php">Vizualizare abonați</a></td>
        </tr>
        <tr>
            <td><a href="display_clients.php">Vizualizare clienți</a></td>
        </tr>
        <tr>
            <td><a href="display_invoices.php">Vizualizare facturi</a></td>
        </tr>

    </table>
    </div>

</div>

<?php
include('footer_admin.php');
?>