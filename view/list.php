<html>
<body>
<table border="1px solid black">
    <tr>
    <th>Id </th>
    <th>Name</th>
    <th>ProductImage</th>
    <th>Price</th>
    <th>Brand</th>
    <th>SKU</th>
    <th>Action</th>
    </tr>
        <?php foreach ($allData as $data): ?>
        <td><?php echo $data->id?></td>
        <td><?php echo $data->product_name?></td>
        <td><img class="image" src="<?= $data->product_image?>"></td>
        <td><?php echo $data->price?></td>
        <td><?php echo $data->brand?></td>
        <td><?php echo $data->sku?></td>
        <td>
            <form method="post" action="/index.php">
                <input type="hidden" name="action" value="delete">
                <button type="submit" value="<?=$data->id;?>" name="deleteId" class="delete">Delete</button>
            </form>
        </td>
        <td>
            <form method="post" action="../../index.php">
                <input type="hidden" name="editId"  value="<?=$data->id;?>">
                <button type="submit" value="edit" name="action">Edit</button>
            </form>
        </td>
    </tr>
        <?php endforeach;?>
</table>
<a href="../view/form.php">Add Product</a>
</body>
</html>


<style>
    .image{
        width: 75px;
        height: 75px;
    }
</style>