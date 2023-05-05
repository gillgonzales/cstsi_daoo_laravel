
# Principais consultas
```
Jogador::with('Jogos')->find(1)

Lobby::with('jogo','jogador')->get()

Lobby::with('jogo','jogador','jogadores')->find(1)

Lobby::with('jogo', 'jogador')
    ->whereHas('jogo', function ($query) {
        $query->where('id', 1);
    })
    ->get();
```


