<table border="1">
    <tr>
        <th>Name</th>
        <th>Age</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['age'] ?></td>
        </tr>
    <?php } ?>
</table>