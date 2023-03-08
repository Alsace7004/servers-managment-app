<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Domaines Expiré</title>
    <style>
        /******************************TABLE-DESIGN-BEGIN******************************/
            table{
                text-align: center;
                width: 100%;
                background-color: #fafafa;
                border-collapse: collapse;
            }
            table thead th{
                text-transform: uppercase;
                background-color: rgb(81, 79, 79);
                color: #fff;
            }
            table th,td{
                padding: 8px 10px;
            }
            .msg_title{
                text-align: center;
                color:  rgb(81, 79, 79);
            }
        /******************************TABLE-DESIGN-END******************************/
    </style>
</head>
<body>
    {{-- Begin --}}
            <h3 class="">Bonjour, liste des domaines et hebergements qui arriverons à écheance dans moins d'une semaine</h3>
            <table>
                <thead>
                    <tr>
                        <th>Domaine/Hebergement</th>
                        <th>Type</th>
                        <th>Date Expiration</th>
                        <th>Jours Restant</th>
                        {{-- <th>Nom de domaine</th>
                        <th>Hebergeur</th>
                        <th>Registre</th>
                        <th>Date Expiration</th>
                        <th>Jours Restant</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domaines as $item)
                        <tr>
                            <td>{{$item->nom_domaine}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->thediff}}</td>
                            {{-- <td>{{$item->nom_domaine}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->registre}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->thediff}}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

    {{-- End --}}
</body>
</html>


