<?php

$tableBody = "";
foreach ($reservations as $reservation) {
    $guest = $reservation->getGuest();
    $room = $reservation->getRoom();
    $tableBody .= <<<HTML
            <tr>
                <td>{$reservation->id}</td>
                <td>{$room->number}</td>
                <td>{$guest->name}</td>
                <td>{$reservation->days}</td>
                <td>{$reservation->date}</td>
                <td class='flex float-right'>
                    <form method='post' action='/reservations/edit'>
                        <input type='hidden' name='id' value='{$reservation->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                    <form method='post' action='/reservations'>
                        <input type='hidden' name='id' value='{$reservation->id}'>    
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'><i class='fa fa-trash trash'></i></button>
                    </form>
                </td>
            </tr>
            HTML;
}

$html = <<<HTML
        <table id='admin-rooms-table' class='admin-rooms-table tabla'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Szoba</th>
                    <th>Vendég</th>
                    <th>Napok</th>
                    <th>Dátum</th>
                    <th>
                        <form method='post' action='/reservations/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'></i>&nbsp;Új</button>
                        </form>
                    </th>
                </tr>
            </thead>
             <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;

echo sprintf($html, $tableBody);
