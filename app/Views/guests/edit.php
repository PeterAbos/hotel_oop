<?php

$html = <<<HTML
        <form method='post' action='/guests'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$guests->id}">
            <fieldset>
                <label for="guests">Vendég</label>
                <input type="text" name="name" id="name" value="{$guests->name}">
                <input type="number" name="age" id="age" value="{$guests->age}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/guests"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;