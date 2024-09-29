<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
    <h2 style="text-align: center; color: #333;">Zakazivanje</h2>
    <hr style="border: 1px solid #ccc;">
    <div style="margin-bottom: 10px;">
        <strong>Ime:</strong> {{ $request->name }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Email:</strong> {{ $request->email }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Telefon:</strong> {{ $request->phone }}
    </div>
    <div style="margin-bottom: 20px;">
        <strong>Poruka:</strong> <br>
        {{ $request->message }}
    </div>
</div>
