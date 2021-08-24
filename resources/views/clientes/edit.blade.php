<h3>Alterar Cliente</h3>

<form action="{{ route('clientes.update', $clientes['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" value="{{ $clientes['nome'] }}">
    <input type="submit" value="Salvar">
</form>
