<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
    <h2 style="text-align: center; color: #333;">Veleprodaja formular</h2>
    <hr style="border: 1px solid #ccc;">
    <div style="margin-bottom: 10px;">
        <strong>Ime/Kompanija:</strong> {{ $request->name }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Email:</strong> {{ $request->email }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Telefon:</strong> {{ $request->phone }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Adresa:</strong> {{ $request->address }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Kontakt osoba:</strong> {{ $request->contact_person }}
    </div>
    <div style="margin-bottom: 20px;">
        <strong>Poruka:</strong> <br>
        {{ $request->message }}
    </div>
</div>
