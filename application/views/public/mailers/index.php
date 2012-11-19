<?if(!empty($error)){?>
<div style="color: #8b0000">
    <?=$error?>
</div>
<?}elseif(count($contacts)){?>
<div>
    <?foreach($contacts as $contact){?>
    <b><?=$contact?></b><br>
    <?}?>
</div>
<?}?>

<div class="form_content">
    <form method="post">
        <input type="hidden" name="mailer" value="mail">
        Подключалка к Mail.ru/bk.ru/inbox.ru/list.ru: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="yandex">
        Подключалка к Yandex: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <!--form method="post">
        <input type="hidden" name="mailer" value="google">
        Подключалка к Google: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form-->

    <form method="post">
    <input type="hidden" name="mailer" value="ukrnet">
        Подключалка к UkrNet: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="iua">
        Подключалка к i.ua: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="uafm">
        Подключалка к ua.fm: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="emailua">
        Подключалка к email.ua: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="3gua">
        Подключалка к 3g.ua: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="rambler">
        Подключалка к Rambler: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="meta">
        Подключалка к Meta: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <form method="post">
        <input type="hidden" name="mailer" value="mailua">
        Подключалка к Mail.ua: <br>
        <input type="text" name="login"><br>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

</div>