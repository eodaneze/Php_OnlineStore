<?php
  require_once('./header.php');
  require_once('./navbar.php');
  require_once('./sidebar.php');

?>
<main class="main" id="main">
    <h4>Read Store | Add Category</h4>

    <div class="container">
        <form action="./includes/addCategory.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <label>category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-lg-6 mb-4">
                    <label>category Image</label>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <button class=" btn btn-secondary" name="add">Add Category</button>
        </form>
    </div>
</main>

<?php
require_once("./footer.php");
?>