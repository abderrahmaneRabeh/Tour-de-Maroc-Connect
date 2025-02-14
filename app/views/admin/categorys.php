<?php

require_once '../app/config/config.php'
    ?>

<h1>Categories</h1>



<h2>Add New Category</h2>
<form action="<?= URLROOT ?>/Categorys/add" method="POST">
    <label for="nom">Category Name</label>
    <input type="text" name="nom" id="nom" />
    <button type="submit">Add Category</button>

</form>

<?php foreach ($data as $category): ?>
    <div>
        <p>ID: <?php echo $category['id']; ?></p>
        <p>Name: <?php echo $category['nom']; ?></p>
    </div>
    <button onclick="openEditModal('<?php echo $category['id']; ?>', '<?php echo $category['nom']; ?>')"
        class="text-blue-500 ml-8">Edit</button>

<?php endforeach; ?>




<div id="editModal" style="display:none;">
    <form method="POST" action="<?= URLROOT ?>/Categorys/updateCategory">
        <input type="hidden" name="id_category" id="categoryId">
        <input type="text" name="nom_category" id="categoryName">
        <button type="submit">Save Changes</button>
    </form>
</div>

<script>
    function openEditModal(id, name) {
        // Populate the hidden form with the category's ID and name
        document.getElementById('categoryId').value = id;
        document.getElementById('categoryName').value = name;

        // Display the modal
        document.getElementById('editModal').style.display = 'block';
    }
</script>