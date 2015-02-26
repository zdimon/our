<table id="sfForum_message_show">
  <tbody>
    <tr>
      <th>Topic:</th>
      <td><?php echo $message->getTopicId() ?></td>
    </tr>
    <tr>
      <th>Id:</th>
      <td><?php echo $message->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $message->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $message->getContent() ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $message->getAuthor() ?></td>
    </tr>
    <tr>
      <th>Hide:</th>
      <td><?php echo $message->getHide() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $message->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $message->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sfForumMessage/edit?id='.$message->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sfForumTopic/index?id='.$message->getTopicId()) ?>">List</a>
