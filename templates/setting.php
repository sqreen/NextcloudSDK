<div id="sqreen_sdk" class="section">
    <h2>Sqreen SDK</h2>

    <p class="settings-hint">
        <?php
            p($l->t('Sqreen SDK app implement the Sqreen SDk to send meaningful information to Sqreen. Configuration of Sqreen need to be done following these instructions: '));
        ?><a href='https://docs.sqreen.com/php/configuration/'>https://docs.sqreen.com/php/configuration/</a>

    </p>

    <ul>
        <li>
        <b>Sqreen version</b>: <?php
            p(htmlspecialchars(phpversion("sqreen")));
        ?>
        </li>
        <li>
        <b>Sqreen app_name</b>: <?php
            p(htmlspecialchars(ini_get('sqreen.app_name')));
        ?>
        </li>
    </ul>
</div>
