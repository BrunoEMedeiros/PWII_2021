<h3>Produtos</h3>
<a href="{{ route('produtos.create') }}">Novo</a>
<ol>
    @foreach ($produtos as $p)
        <li> {{ $p['nome'] }} </li>
    @endforeach

</ol>
