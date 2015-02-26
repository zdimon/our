
<?php include_partial('global/assets') ?>

<h1> <?= __('Темы админ панели') ?></h1>

<table>
    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/redmond.gif'),'switcher/go?name=redmond')?> </td>
        <td> <?= link_to('redmond','switcher/go?name=redmond')?> </td>
    </tr>

    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/flick.gif'),'switcher/go?name=flick')?> </td>
        <td> <?= link_to('flick','switcher/go?name=flick')?> </td>
    </tr>

    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/vader.gif'),'switcher/go?name=vader')?> </td>
        <td> <?= link_to('vader','switcher/go?name=vader')?> </td>
    </tr>

    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/le-frog.gif'),'switcher/go?name=le-frog')?> </td>
        <td> <?= link_to('le-frog','switcher/go?name=le-frog')?> </td>
    </tr>

    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/blitzer.gif'),'switcher/go?name=blitzer')?> </td>
        <td> <?= link_to('blitzer','switcher/go?name=blitzer')?> </td>
    </tr>


     <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/sunny.gif'),'switcher/go?name=sunny')?> </td>
        <td> <?= link_to('sunny','switcher/go?name=sunny')?> </td>
    </tr>

    <tr>
        <td>  <?= link_to(image_tag('/sfAdminThemejRollerPlugin/images/sunny.gif'),'switcher/go?name=aristo')?> </td>
        <td> <?= link_to('aristo','switcher/go?name=aristo')?> </td>
    </tr>

</table>
