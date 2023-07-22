<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM products WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $pimage = $row['pimage'];
      $pname = $row['pname'];
      $pprice = $row['pprice'];
      $prating = $row['prating'];
      $pcat = $row['pcat'];
      $descp = $row['descp'];
      $pstock = $row['pstock'];
      $id = $row['id'];
  }

?>

<main class="main" id="main">
    <h1>RedStore | Update Product</h1>

    <div class="container">
        <form action="./includes/updateProduct.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <label>Product Name</label>
                    <input type="text" name="pname" class="form-control" value="<?=$pname?>">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="photo" value="<?=$pimage?>">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Product Price ($)</label>
                    <input type="text" name="pprice" class="form-control" value="<?=$pprice?>">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Prduct category</label>
                    <select name="pcat" class="form-control">
                        <option><?=$pcat?></option>
                        <?php
                           $sql = "SELECT * FROM category";
                           $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)){
                             $name = $row['cat_name'];

                             ?>
                        <option><?=$name?></option><?php
                          }
                        ?>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Product Rating</label>
                    <input type="number" name="prating" class="form-control" value="<?=$prating?>">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>Stock</label>
                    <input type="number" name="pstock" class="form-control" value="<?=$pstock?>">
                </div>

                <div class="col-lg-6 mb-4">
                    <label><img style="width: 3rem; height: 3rem; border-radius: 50%"
                            src="./includes/productImg/<?=$pimage?>" alt=""></label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="col-lg-12 mb-4">
                    <label>Product Description</label>
                    <textarea name="descp" class="form-control"><?=$descp?></textarea>
                </div>

            </div>
            <button class=" btn btn-secondary" name="update">Update Product</button>
        </form>
    </div>
</main>

<?php
 require_once("./footer.php")
?>