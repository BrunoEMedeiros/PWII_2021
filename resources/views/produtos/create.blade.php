<h3>Novo produto</h3>
<form action="{{ route('produtos.store') }}" method="POST">
    <input type="text" name="nome">
    <input type="submit" value="Salvar">
</form>
