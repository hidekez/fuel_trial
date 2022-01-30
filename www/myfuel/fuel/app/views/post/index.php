<h2>Listing <span class='muted'>Posts</span></h2>
<br>
<?php if ($posts): ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th>User id</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $item): ?>
            <tr>
                <td><?php echo $item->title; ?></td>
                <td><?php echo $item->body; ?></td>
                <td><?php echo $item->user_id; ?></td>
                <td>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <?php echo Html::anchor('posts/view/' . $item->id, '<i class="icon-eye-open"></i> View', ['class' => 'btn btn-default btn-sm']); ?>
                            <?php echo Html::anchor('posts/edit/' . $item->id, '<i class="icon-wrench"></i> Edit', ['class' => 'btn btn-default btn-sm']); ?>
                            <?php echo Html::anchor('posts/delete/' . $item->id, '<i class="icon-trash icon-white"></i> Delete', ['class' => 'btn btn-sm btn-danger',]); ?>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No Posts.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('posts/add', 'Add new Post', ['class' => 'btn btn-success']); ?>

</p>
