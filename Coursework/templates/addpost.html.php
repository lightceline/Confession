<form action="" method="post">
    <label for="postContent">Type your content here:</label>
    <textarea name="postContent" rows="2" cols="40"></textarea>

    <!-- <label for="image">Add your image here:</label>
    <textarea name="image" rows="2" cols="40"></textarea> -->
    <!-- <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Choose your image</label>
        <textarea name="image" rows="2" cols="40">
        <input type="file" name="fileToUpload">
    </form> -->
    <label for="image">Choose your image:</label>
    <!-- <input type="file" name="image" id="image" accept="image/*"> -->
     <input type="file" name="image" id="image" accept="image/*">
    <!-- <button type="submit" name="upload">Upload Image</button> -->

    <select name="user_id">
        <option value="">Select an user</option>
        <?php foreach ($users as $user):?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <select name="module_id">
        <option value="">Select a module</option>
        <?php foreach ($modules as $module):?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>
    <input type="submit" name="submit" value="Add">

</form>