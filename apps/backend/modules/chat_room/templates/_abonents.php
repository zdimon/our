

<div style="border: 1px solid silver; padding: 5px; margin: 2px">

    <table>
        <tr>
            <td><img src="<?= $chat2_room->getCaller()->getProfile()->getUrlImageSmall() ?>" ></td>
            <td valign="top" style="padding: 5px">
                ID: <?= $chat2_room->getCaller()->getProfile()->getUserSpecId() ?> <br />
                <?= $chat2_room->getCaller()->getProfile()->getFirstName() ?> <?= $chat2_room->getCaller()->getProfile()->getLastName() ?>
            </td>
            <td><img src="<?= $chat2_room->getAnswer()->getProfile()->getUrlImageSmall() ?>" ></td>
            <td valign="top" style="padding: 5px">
                ID: <?= $chat2_room->getAnswer()->getProfile()->getUserSpecId() ?> <br />
                <?= $chat2_room->getAnswer()->getProfile()->getFirstName() ?> <?= $chat2_room->getAnswer()->getProfile()->getLastName() ?>
            </td>
        </tr>
    </table>

    </div>

  <div style="clear: both;"></div>
</div>