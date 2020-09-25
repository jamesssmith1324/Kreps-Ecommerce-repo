<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Product Insert</title>
</head>
<body>
    <form action="insertData.php" method="post" enctype='multipart/form-data'>
        <label>Product ID:</label>
        <input type="text" name="productID" require>
        <br><br>
        <label>Name:</label>
        <input type="text" name="name" require>
        <br><br>
        <label>Product Brand:</label>
        <input type="text" name="brand" require>
        <br><br>
        <label>Price:</label>
        <input type="text" name="price" require>
        <br><br>
        <label>Stock:</label>
        <input type="number" name="stock" require>
        <br><br>
        <label>Product Image:</label>
        <input type="file" name="image" require accept=".jpg, .jpeg, .png, .gif">
        <br><br>
        <label>Product Hover Image:</label>
        <input type="file" name="hoverImage" require accept=".jpg, .jpeg, .png, .gif">
        <br><br>
        <label>Product Display Image 1:</label>
        <input type="file" name="displayImg1" require accept=".jpg, .jpeg, .png, .gif">
        <br><br>
        <label>Product Display Image 2:</label>
        <input type="file" name="displayImg2" require accept=".jpg, .jpeg, .png, .gif">
        <br><br>
        <label>Description:</label>
        <textarea name="description" require></textarea>
        <br><br>
        <label>What Database Table:</label>
        <select name="whatTable" id="">
            <option value="products">Products</option>
            <option value="featureproducts">Feature Products</option>
        </select>
        <br><br>
        <input type="submit" value="Submit" name="submit">

    </form>
</body>
</html>