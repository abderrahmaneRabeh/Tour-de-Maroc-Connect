
<?php

require_once '../app/config/config.php'
?>

<h1>Categories</h1>



<h2>Add New Category</h2>
<form action="<?= URLROOT ?>/Categorys/add" method="POST">
    <label for="nom">Category Name</label>
    <input type="text" name="nom" id="nom" required />
    <button type="submit">Add Category</button>
</form>

<?php foreach ($data as $category): ?>
    <div>
        <p>ID: <?php echo $category['id']; ?></p>
        <p>Name: <?php echo $category['nom']; ?></p>
    </div>
<?php endforeach; ?>
