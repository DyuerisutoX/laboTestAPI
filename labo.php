<h3>Variable HTTP serveur ($_SERVER)</h3>

<table border = "1">
    <?php foreach ($_SERVER as $item => $valeur) { ?>
    <tr>
        <td><?php echo $item;  ?></td>
        <td><?php echo $valeur;  ?>&nbsp </td>
    </tr>
    <?php } ?>
</table>

