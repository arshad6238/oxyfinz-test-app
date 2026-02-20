<h1>Users and Their Posts</h1>

<?php foreach($users as $user): ?>
    <h2>User: <?php echo CHtml::encode($user->username); ?></h2>

    <?php if (!empty($user->posts)): ?>
        <ul>
            <?php foreach($user->posts as $post): ?>
                <li>
                    <strong><?php echo CHtml::encode($post->title); ?>:</strong>
                    <?php echo CHtml::encode($post->content); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No posts for this user.</p>
    <?php endif; ?>

<?php endforeach; ?>
