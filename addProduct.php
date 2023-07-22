<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<main class="main" id="main">
    <h1>RedStore | Add Product</h1>

    <div class="container">
        <form action="./includes/addProduct.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <label>Product Name</label>
                    <input type="text" name="pname" class="form-control">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Product Price ($)</label>
                    <input type="text" name="pprice" class="form-control">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Prduct category</label>
                    <select name="pcat" class="form-control">
                        <option>--Select Category--</option>
                        <?php
                           $sql = "SELECT * FROM category";
                           $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)){
                             $name = $row['cat_name'];

                             ?><option><?=$name?></option><?php
                          }
                        ?>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Product Rating</label>
                    <input type="number" name="prating" class="form-control">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Stock</label>
                    <input type="number" name="pstock" class="form-control">
                </div>

                <div class="col-lg-6 mb-4">
                    <label>Product Image</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="col-lg-12 mb-4">
                    <label>Product Description</label>
                    <textarea name="descp" class="form-control"></textarea>
                </div>
            </div>
            <button class=" btn btn-secondary" name="add">Add Product</button>
        </form>
    </div>
</main>

<?php
 require_once("./footer.php")
?>