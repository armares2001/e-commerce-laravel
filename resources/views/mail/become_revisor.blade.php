<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>{{__('ui.Un_utente_ha_richiesto_di_lavorare_con_noi')}}</h1>
        <h2>{{__('ui.Ecco_i_suoi_dati')}}:</h2>
        <p>{{__('ui.Nome')}}: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>{{__('ui.Se_vuoi_renderlo_revisore_clicca_qui')}}</p>
        <a href="{{route('make',compact('user'))}}">{{__('ui.Rendi_revisore')}}</a>
    </div>
</body>
</html>