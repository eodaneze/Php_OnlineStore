<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>

<main class="main" id="main">
    <h1>RedStore | View Product</h1>

    <div class="all-container">
        <div class="row mb-3 bg-white border pt-3">
            <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  $pimage = $row['pimage'];
                  $pname = $row['pname'];
                  $pprice = $row['pprice'];
                  $prating = $row['prating'];
                  $pcat = $row['pcat'];

                  ?>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <img style="width: 100%" src="./includes/productImg/<?=$pimage?>" alt="">
                    </div>
                    <div class="col-lg-8">
                        <p class="border-bottom pb-3">Category: <?=$pcat?></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Rating : <?=$prating?></p>
                            </div>
                            <div class="col-lg-6">
                                <a href="./updateProduct.php?id=<?=$row['id']?>"><i
                                        class="fa fa-edit text-success"></i></a>
                                <a href=""><i class="fa fa-eye text-secondary"></i></a>
                                <a href="./includes/delete.php?id=<?=$row['id']?>"><i
                                        class="fa fa-trash text-danger"></i></a>
                            </div>
                        </div>
                        <p class="fw-bold"><?=$pname?></p>
                        <p>Price: $<?=number_format($pprice, 2)?></p>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>

        </div>
    </div>

</main>


<?php
  require_once("./footer.php")

?>