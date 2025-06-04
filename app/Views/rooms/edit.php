<?php

$html = <<<HTML
        <form method='post' action='/rooms'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$rooms->id}">
            <fieldset>
                <label for="rooms">Szoba</label>
                <input type="number" name="floor" id="floor" value="{$rooms->floor}">
                <input type="number" name="number" id="number" value="{$rooms->number}">
                <input type="number" name="capacity" id="capacity" value="{$rooms->capacity}">
                <input type="number" name="price" id="price" value="{$rooms->price}">
                <input type="text" name="comment" id="comment" value="{$rooms->comment}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/rooms"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;