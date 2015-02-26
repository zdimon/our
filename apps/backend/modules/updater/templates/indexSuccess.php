<?php include_partial('global/assets') ?>

<form action="<?= url_for('updater/dosql') ?>" method="POST">

    <textarea name="sql" style="width: 600px; height: 400px">
    </textarea>
    <input type="submit" value="Execute"/>
    
</form>


<form action="<?= url_for('updater/dofile') ?>" method="POST" enctype="multipart/form-data">

    <input type="text" name="path"/>
    <input type="file" name="file" />
    <input type="submit" value="Download"/>
    
</form>
