<h1>Messages List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Author</th>
      <th>Hits</th>
      <th>Hide</th>
      <th>Position</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($messages as $message): ?>
    <tr>
      <td><a href="<?php echo url_for('sfForumMessage/show?id='.$message->getId()) ?>"><?php echo $message->getId() ?></a></td>
      <td><?php echo $message->getName() ?></td>
      <td><?php echo $message->getDescription() ?></td>
      <td><?php echo $message->getAuthor() ?></td>
      <td><?php echo $message->getHits() ?></td>
      <td><?php echo $message->getHide() ?></td>
      <td><?php echo $message->getPosition() ?></td>
      <td><?php echo $message->getCreatedAt() ?></td>
      <td><?php echo $message->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('sfForumMessage/new') ?>">New</a>
