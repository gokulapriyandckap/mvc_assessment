<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Product Edit Page</h1>
<div class="container" >
     <?php foreach ($editFetchData as $editData):?>
    <form action="../index.php" method="post" enctype="multipart/form-data">
       <input name="editedId" value="<?= $editData->id?>"  type="hidden">
        <label>Product Name</label>
        <input name="edited_product_name" type="text" value="<?= $editData->product_name; ?>">
        <label>Product Image</label>
        <input type="file" required name="product_image">
        <label class="align">SKU</label>
        <input required  value="<?= $editData->sku;?>" name="edited_sku">
        <label class="align">Price</label>
        <input name="edited_price" value="<?= $editData->price;?>" required type="number">
        <label class="align">Brand</label>
        <select name="edited_brand" >
            <option value="Sonata">Sonata</option>
            <option value="LG">LG</option>
            <option value="Redmi">Redmi</option>
            <option value="Preethi">Preethi</option>
        </select>
        <label>Available stock</label>
        <input name="edited_available_stock" type="number" value="<?= $editData->available_stock;?>">
        <input type="hidden" name="action" value="update">
        <button type="submit" name="update">Update</button>
    </form>
    <?php endforeach; ?>
</div>
</body>
</html>


<style>
    body{
        background: aliceblue;
    }
    .container{
        text-align: center;
        display: flex;
        flex-direction: column;
        word-wrap:break-word;
        gap: 10px;
    }
    form{
        padding: 10px;
    }
    input{
        padding: 7px;
        /*margin: 10px;*/
        display: flex;
        gap: 10px;
    }
    h1{
        text-align: center;
    }
    form {
        width: 80%;
        margin: 0 auto;
    }
    label,
    input {
        display: inline-block;
    }

    label {
        font-weight: bold;
        margin-left: 9rem;
        padding-top: 0.1rem;
        margin-bottom: 0.1rem

    }

    label+input {
        width: 20%;
        text-align: center;
        font-weight: bold;
    }
    input+input {
        float: right;
    }
    label {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        width: 400px;
        line-height: 1.3rem;
    }
    .align{
        margin-right:100rem;
        padding-right:10rem;
    }
</style>