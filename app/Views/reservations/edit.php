<?php

$html = <<<HTML
        <form method='post' action='/reservations'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$reservations->id}">
            <fieldset>
                <label for="reservations">Foglalás</label>
                <input type="text" name="room_id" id="room_id" value="{$reservations->room_id}">
                <input type="text" name="guest_id" id="guest_id" value="{$reservations->guest_id}">
                <input type="text" name="days" id="days" value="{$reservations->days}">
                <input type="text" name="date" id="date" value="{$reservations->date}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/reservations"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;