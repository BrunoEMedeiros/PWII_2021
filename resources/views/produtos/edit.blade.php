<h3>Editar produto</h3>

<form action="{{ route('produtos.update', $produtos['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{ $produtos['nome'] }}">
    <input type="submit" value="Salvar">
</form>

<a href=" {{ route('produtos.index') }}">Voltar</a>

