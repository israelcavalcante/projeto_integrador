<?php

include_once("../Conexao.php");

class livro
{
    protected $id_livro;
    protected $titulo;
    protected $preco_livro;
    protected $categoria_livro;
    protected $isbn;
    protected $id_editora;
    protected $foto;

    /**
     * @return mixed
     */
    public function getIdEditora()
    {
        return $this->id_editora;
    }

    /**
     * @param mixed $id_editora
     */
    public function setIdEditora($id_editora)
    {
        $this->id_editora = $id_editora;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getIdLivro()
    {
        return $this->id_livro;
    }

    /**
     * @param mixed $id_livro
     */
    public function setIdLivro($id_livro)
    {
        $this->id_livro = $id_livro;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getPrecoLivro()
    {
        return $this->preco_livro;
    }

    /**
     * @param mixed $preco_livro
     */
    public function setPrecoLivro($preco_livro)
    {
        $this->preco_livro = $preco_livro;
    }

    /**
     * @return mixed
     */
    public function getCategoriaLivro()
    {
        return $this->categoria_livro;
    }

    /**
     * @param mixed $categoria_livro
     */
    public function setCategoriaLivro($categoria_livro)
    {
        $this->categoria_livro = $categoria_livro;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }






//    Métodos
    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "SELECT * FROM livro ";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_livro)
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM livro WHERE id_livro = $id_livro";
        $dados = $conexao->recuperarDados($sql);

        $this->id_livro = $dados[0]['id_livro'];
        $this->titulo = $dados[0]['titulo'];
        $this->preco_livro = $dados[0]['preco_livro'];
        $this->categoria_livro = $dados[0]['categoria_livro'];
        $this->isbn = $dados[0]['isbn'];
        $this->id_editora = $dados[0]['id_editora'];
        $this->foto = $dados[0]['foto'];
         }


    public function inserir($dados)
    {
        $titulo = $dados['titulo'];
        $preco_livro = $dados['preco_livro'];
        $categoria_livro = $dados['categoria_livro'];
        $isbn = $dados['isbn'];
        $id_editora = $dados['id_editora'];
        $foto = $_FILES['foto']['name'];
        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "INSERT INTO livro (titulo, preco_livro, categoria_livro, isbn, id_editora, foto)";
        $sql .= " VALUES ('$titulo','$preco_livro','$categoria_livro','$isbn', '$id_editora', '$foto')";

        return $conexao->executar($sql);
    }
    public function alterar($dados)
    {
        $id_livro = $dados['id_livro'];
        $titulo = $dados['titulo'];
        $preco_livro = $dados['preco_livro'];
        $categoria_livro = $dados['categoria_livro'];
        $isbn = $dados['isbn'];
        $id_editora = $dados ['id_editora'];
        $foto = $_FILES['foto']['name'];
        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "UPDATE livro SET titulo = '$titulo', preco_livro = '$preco_livro', categoria_livro = '$categoria_livro', isbn = '$isbn', id_editora = '$id_editora', foto = '$foto' WHERE id_livro = $id_livro ";

        return $conexao->executar($sql);
    }

    public function excluir($id_livro)
    {
        $conexao = new Conexao();

        $sql = "DELETE from livro WHERE id_livro = '$id_livro'";

        return $conexao->executar($sql);
    }

    public function existeNome($titulo)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(titulo) qtd FROM livro WHERE titulo = '$titulo'";

        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }
    public function uploadFoto(){

        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK)
        {
            $origem = $_FILES['foto']['tmp_name'];
            $destino = '../upload/Livro/' . $_FILES['foto']['name'];
            move_uploaded_file($origem, $destino);
        }
    }
}