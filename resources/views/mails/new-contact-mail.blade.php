<div>
    <h1>Ciao Admin</h1>
    <p>
        Hai ricevuto un messaggio, ecco i dettagli: <br>
        Nome: {{ $lead->name }} <br>
        Email: {{ $lead->email }} <br>
        Messaggio: {{ $lead->message }} <br>
        Address: {{ $lead->address }}
    </p>
</div>
