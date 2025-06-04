<?php

echo <<<HTML
        <form method='post' action='/reservations'>
            <fieldset>
                <label for="name">Foglalás</label>
    HTML;
                
echo "<select id='room_id'>";
foreach ($rooms->all() as $room) {
    echo "<option value='{$room->id}'>{$room->number}</option>";
}
echo "</select>";

echo "<select id='guest_id'>";
foreach ($guests->all() as $guest) {
    echo "<option value='{$guest->id}'>{$guest->name}</option>";
}
echo "</select>";

echo <<<HTML
                <input type="text" name="days" id="days">
                <input type="date" name="date" id="date">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/reservations"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;