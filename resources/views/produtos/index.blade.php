<h3>Produtos</h3>
<a href="{{ route('produtos.create') }}">Novo</a>
<ul>
    @foreach ($produtos as $p)
    <li>
        {{ $p['id'] }} | {{ $p['nome'] }}
        <a href="{{ route('produtos.show', $p['id']) }}">Detalhes</a>
        <a href="{{ route('produtos.edit', $p['id']) }}">Alterar</a>
    </li>
    @endforeach

</ul>
