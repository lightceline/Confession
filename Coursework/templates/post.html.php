<p>Posts (<?=$totalPosts?>)</p>

<?php
foreach($posts as $post): ?>
    <blockquote>

    <a href="mailto:<?=htmlspecialchars($post['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8'); ?></a><br /><br />

        <?=htmlspecialchars($post['moduleName'], ENT_QUOTES, 'UTF-8');?><br /><br />

        <?=htmlspecialchars($post['postContent'], ENT_QUOTES, 'UTF-8' )?><br /><br />
    

        <?php if (!empty($post['image'])) : ?>
            <img height="100px" src="uploads/<?= htmlspecialchars($post['image']); ?>" alt="Post Image">
        <?php else : ?>
            No image
        <?php endif; ?><br /><br />

        <a href="addComment.php?id=<?=$post['id']?>">Comment</a>

        <a href="editpost.php?id=<?=$post['id']?>">Edit</a>
        <form action="deletepost.php" method="post">
            <input type='hidden' name='id' value='<?=$post['id']?>'>
            <input type="submit" value="Delete">
        </form>

    </blockquote>
    <?php endforeach;?>