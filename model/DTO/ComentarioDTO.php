<?php
class ComentarioDTO
{

    private $idCom;
    private $usuario_idUsu;
    private $produto_idPro;
    private $estrelas;
    private $comentarioPro;
    private $situacaoComentarioPro;

    public function setUsuario_idUsu($usuario_idUsu)
    {
        $this->usuario_idUsu = $usuario_idUsu;
    }
    public function getUsuario_idUsu()
    {
        return $this->usuario_idUsu;
    }
    public function setProduto_idPro($produto_idPro)
    {
        $this->produto_idPro = $produto_idPro;
    }
    public function getProduto_idPro()
    {
        return $this->produto_idPro;
    }

    public function setEstrelas($estrelas)
    {
        $this->estrelas = $estrelas;
    }
    public function getEstrelas()
    {
        return $this->estrelas;
    }
    public function setComentarioPro($comentarioPro)
    {
        $this->comentarioPro = $comentarioPro;
    }
    public function getComentarioPro()
    {
        return $this->comentarioPro;
    }
    public function setSituacaoComentarioPro($situacaoComentarioPro)
    {
        $this->situacaoComentarioPro = $situacaoComentarioPro;
    }
    public function getSituacaoComentarioPro()
    {
        return $this->situacaoComentarioPro;
    }
    public function setIdCom($idCom)
    {
        $this->idCom = $idCom;
    }
    public function getIdcom()
    {
        return $this->idCom;
    }
}
